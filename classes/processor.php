<?php

namespace myPHPnotes;


use Symfony\Component\Process\ProcessBuilder;


use Noodlehaus\Config;

/**
* Video Processing Class
*/
class Processor
{
protected $processBuilder;
protected $config;

function __construct (Config $config)
{
	
	$this->config = $config;
	$this->processBuilder = new ProcessBuilder();
	
	$environment = $this->config->get('environment');
	if($environment == "windows"){
		
		$this->processBuilder->setprefix([$this->config->get('paths.youtube-dl')]);	
	}else{
		$this->processBuilder->setPrefix(array_merge([$this->config->get('paths.python')], [$this->config->get('paths.youtube-dl')]));
		
	}
  }
  
  public function getEntity($url, $format, $property = "dump-json"){
	  
	  $this->processBuilder->setArguments(["-4","--".$property, $url]);
	  if (isset($format)){
		  $this->processBuilder->add('-f'.$format);
		  }
		 $command = $this->processBuilder->getProcess()->getCommandLine();
		 
		// var_dump($command);
		// die();
		 
		  $process = $this->processBuilder->getProcess();
		  $process->run();
		  if(!$process->isSuccessful()){
			  //If Process is unsuccessful
			  $error = $process->getErrorOutput();
			  throw new \Exception("Error Processing Request". $error, 1);
			  }
			  else {
				  return trim ($process->getOutput());
			  }
	  }

	  public function getJSON($url, $format = null)
	  {
		  
		  
		  return json_decode($this->getEntity($url, $format,'dump-single-json'));
	  }
	  
	   public function getURL($url , $format)
	  {
	  $url_array = $this->getEntity($url, $format, 'get-url');
	  if(!$url_array){
		  return false;
	  }
	  return explode(PHP_EOL, $url_array)[0];
	  }
	  
	   public function getTitle($url){
		   
		   $title= $this->getEntity($url, null, 'get-title');
		   return $title;
	   }
	  
	}

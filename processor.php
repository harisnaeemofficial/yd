<?php

namespace myPHPnotes;

use Symfony\Component\Process\ProcessBuilder;
use Noodlehuas\Config;

/**
* Video Processing Class
*/
Class Processor
Protected $processBuilder;
Protected $config;
function __construct(Config $config){
	
	$this->config = $ config;
	$this->processBuilder = new ProcessBuilder();
	
	$environment = $this->config->get('environment);
	if($environment == "windows"){
		
		$this->processBuilder->setprefix([$this->config->get('paths.youtube-dl']);	
	}else{
		$this->processBuilder->setPrefix(array_merge([$this->config->get('paths.python')], [$this->config->get('paths.youtube-dl')]));
		
	}
  }
}
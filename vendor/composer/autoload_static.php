<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit65d87ca2f109fb0d41f511245b06645c
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Component\\Process\\' => 26,
        ),
        'N' => 
        array (
            'Noodlehaus\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
        'Noodlehaus\\' => 
        array (
            0 => __DIR__ . '/..' . '/hassankhan/config/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit65d87ca2f109fb0d41f511245b06645c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit65d87ca2f109fb0d41f511245b06645c::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit65d87ca2f109fb0d41f511245b06645c::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}

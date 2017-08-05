<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd9af678c83fee728ed27d510d3b04456
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Cat\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Cat\\' => 
        array (
            0 => __DIR__ . '/../..' . '/cat',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd9af678c83fee728ed27d510d3b04456::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd9af678c83fee728ed27d510d3b04456::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd9af678c83fee728ed27d510d3b04456::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}

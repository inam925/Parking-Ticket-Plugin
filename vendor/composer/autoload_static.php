<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0a35f6e518a79f9c8888c606e4cf3417
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0a35f6e518a79f9c8888c606e4cf3417::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0a35f6e518a79f9c8888c606e4cf3417::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0a35f6e518a79f9c8888c606e4cf3417::$classMap;

        }, null, ClassLoader::class);
    }
}
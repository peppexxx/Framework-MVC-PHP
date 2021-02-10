<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3cd994bed610548fc580224e29c6b499
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3cd994bed610548fc580224e29c6b499::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3cd994bed610548fc580224e29c6b499::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3cd994bed610548fc580224e29c6b499::$classMap;

        }, null, ClassLoader::class);
    }
}

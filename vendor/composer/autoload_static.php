<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0881504dda200cfe1123990784663404
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0881504dda200cfe1123990784663404::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0881504dda200cfe1123990784663404::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0881504dda200cfe1123990784663404::$classMap;

        }, null, ClassLoader::class);
    }
}

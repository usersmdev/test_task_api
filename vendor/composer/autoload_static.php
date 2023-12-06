<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0db728a7495a252aedf95274d5ac8591
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
        'App\\Config' => __DIR__ . '/../..' . '/app/Config.php',
        'App\\CountCategory' => __DIR__ . '/../..' . '/app/CountCategory.php',
        'App\\Rest' => __DIR__ . '/../..' . '/app/Rest.php',
        'App\\SQLiteConnection' => __DIR__ . '/../..' . '/app/SQLiteConnection.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0db728a7495a252aedf95274d5ac8591::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0db728a7495a252aedf95274d5ac8591::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0db728a7495a252aedf95274d5ac8591::$classMap;

        }, null, ClassLoader::class);
    }
}
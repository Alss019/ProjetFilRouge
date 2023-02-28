<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc12a24a0b37acdf2e25485bd07d2919c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc12a24a0b37acdf2e25485bd07d2919c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc12a24a0b37acdf2e25485bd07d2919c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc12a24a0b37acdf2e25485bd07d2919c::$classMap;

        }, null, ClassLoader::class);
    }
}

<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit236bc50be850574e2347c6cf3ac5f2e1
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit236bc50be850574e2347c6cf3ac5f2e1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit236bc50be850574e2347c6cf3ac5f2e1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit236bc50be850574e2347c6cf3ac5f2e1::$classMap;

        }, null, ClassLoader::class);
    }
}

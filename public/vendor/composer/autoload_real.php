<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit236bc50be850574e2347c6cf3ac5f2e1
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit236bc50be850574e2347c6cf3ac5f2e1', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit236bc50be850574e2347c6cf3ac5f2e1', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit236bc50be850574e2347c6cf3ac5f2e1::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}

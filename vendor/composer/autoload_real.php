<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit6ed8268eba1dc7db9a078901b8d1e56d
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

        spl_autoload_register(array('ComposerAutoloaderInit6ed8268eba1dc7db9a078901b8d1e56d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit6ed8268eba1dc7db9a078901b8d1e56d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit6ed8268eba1dc7db9a078901b8d1e56d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}

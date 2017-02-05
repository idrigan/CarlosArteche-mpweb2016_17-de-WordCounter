<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb5944084345fc75025fdc93993e4937e
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WordCounter\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WordCounter\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb5944084345fc75025fdc93993e4937e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb5944084345fc75025fdc93993e4937e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

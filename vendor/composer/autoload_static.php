<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb9c04b54a74228d42088d9394de72b8f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Parser\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Parser\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        's' => 
        array (
            'stringEncode' => 
            array (
                0 => __DIR__ . '/..' . '/paquettg/string-encode/src',
            ),
        ),
        'P' => 
        array (
            'PHPHtmlParser' => 
            array (
                0 => __DIR__ . '/..' . '/paquettg/php-html-parser/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb9c04b54a74228d42088d9394de72b8f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb9c04b54a74228d42088d9394de72b8f::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb9c04b54a74228d42088d9394de72b8f::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}

<?php
namespace App\Helpers;
use Storage;

class Image
{
    public static function berita($filename)
    {
        if(!$filename || !self::isExistsStorage('berita-pictures/' . $filename)) {
            $filename = 'no-image.png';
        }

        $path = ':host:/storage/berita-pictures/:image-name:';
        $path = str_replace(':host:', env('APP_URL'), $path);
        $path = str_replace(':image-name:', $filename, $path);

        return $path;
    }

    public static function pengumuman($filename)
    {
        if(!$filename || !self::isExistsStorage('pengumuman-pictures/' . $filename)) {
            $filename = 'no-image.png';
        }

        $path = ':host:/storage/pengumuman-pictures/:image-name:';
        $path = str_replace(':host:', env('APP_URL'), $path);
        $path = str_replace(':image-name:', $filename, $path);

        return $path;
    }

    public static function user($filename)
    {
        if(!$filename || !self::isExistsStorage('user-pictures/' . $filename)) {
            $filename = 'no-image.png';
        }

        $path = ':host:/storage/user-pictures/:image-name:';
        $path = str_replace(':host:', env('APP_URL'), $path);
        $path = str_replace(':image-name:', $filename, $path);

        return $path;
    }

    // public static function product($filename)
    // {
    //     if(!$filename || !self::isExists('product-pictures/' . $filename)) {
    //         $filename = 'no-image.png';
    //     }

    //     $path = ':host:/assets/product-pictures/:image-name:';
    //     $path = str_replace(':host:', env('APP_URL'), $path);
    //     $path = str_replace(':image-name:', $filename, $path);

    //     return $path;
    // }

    public static function isExists($filename)
    {
        $path = public_path() . '/assets/' . $filename;
        return file_exists($path);
    }

    public static function isExistsStorage($filename)
    {
        $path = storage_path() . '/app/public/' . $filename;
        return file_exists($path);
    }

}

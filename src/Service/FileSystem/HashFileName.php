<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 31.07.18
 * Time: 13:24
 */

namespace App\Service\FileSystem;


class HashFileName implements FileNameInterface
{
    public function getName(string $originName): string
    {
        return \md5(\uniqid($originName));
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 31.07.18
 * Time: 13:20
 */

namespace App\Service\FileSystem;


interface FileNameInterface
{
    public function getName(string $originName): string;
}
<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 03.08.18
 * Time: 20:08
 */

namespace App\Service\FileSystem;


interface FileNamePrefixInterface
{
    public function getPrefix(): string;
}
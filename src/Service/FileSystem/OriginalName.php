<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 03.08.18
 * Time: 20:22
 */

namespace App\Service\FileSystem;


class OriginalName implements FileNameInterface, FileNamePrefixInterface
{
    private $prefix;

    public function __construct(string $prefix)
    {
        $this->prefix = $prefix;
    }
    public function getName(string $originName): string
    {
        return $this->getPrefix() . $originName;
    }
    public function getPrefix(): string
    {
        return $this->prefix;
    }
}

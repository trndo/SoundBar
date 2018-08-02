<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 31.07.18
 * Time: 13:28
 */

namespace App\Service\FileSystem;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileManager
{
    private $fileName;
    private $uploadDir;

    public function __construct(FileNameInterface $fileName,string $uploadDir)
    {
        $this->fileName = $fileName;
        $this->uploadDir = $uploadDir;
    }
    public function upload(UploadedFile $file)
    {
        try {
            $newFileName = $this->fileName->getName($file->getClientOriginalName());
            $file->move($this->uploadDir, $newFileName);
            return $newFileName;
        } catch (FileException $e) {
            return null;
        }
    }

    public function realPath(string $fileName)
    {

        return $this->getUploadDir().$fileName;

    }

    /**
     * @return string
     */
    public function getUploadDir(): string
    {
        return $this->uploadDir;
    }


}

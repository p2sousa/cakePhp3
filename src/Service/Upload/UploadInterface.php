<?php

namespace App\Service\Upload;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 * @package App\Service\Upload
 */
interface UploadInterface
{
    /**
     * @return Cake\Filesystem\Folder
     */
    public function createFolder(): Folder;
    
    /**
     * @return array list mime-types accepts.
     */
    public function acceptMimeTypes(): array;
    
    /**
     * 
     * @param File $file
     * @param array $mimeTypes
     * @return bool
     */
    public function handleMimeType(File $file, array $mimeTypes): bool;
    
    /**
     * 
     * @param File $file
     * @param int $limit
     * @return bool
     */
    public function handleSize(File $file, int $limit): bool;

    /**
     * @param string $file
     * @return File
     */
    public function file(string $file): File;

    /**
     * 
     * @param File $file
     * @return File
     */
    public function handleFile(File $file): File; 
    
    /**
     * @param File $file
     * @param Folder $folder
     * @return bool
     */
    public function upload(File $file, Folder $folder): bool;
    
    /**
     * @return string
     */
    public function getPath(): string;
    
    /**
     * @param string $path
     * @return bool
     */
    public function delete(string $path): bool;
    
}

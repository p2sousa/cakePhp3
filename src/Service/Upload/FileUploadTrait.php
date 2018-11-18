<?php

namespace App\Service\Upload;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 * @package App\Service\Upload
 */
trait FileUploadTrait
{
    /**
     *
     * @var string 
     */
    public $folder;
    
    /**
     *
     * @var array 
     */
    public $mimeTypes;
    
    public $ext = [
        'image/jpeg' => '.jpg',
        'image/png' => '.png',
        'image/gif' => '.gif',
    ];
    
    /**
     *
     * @var File 
     */
    protected $file;


    /**
     * @return  Cake\Filesystem\Folder
     */
    public function createFolder(): Folder
    {
        if (!$this->folder) {
            throw new \Exception('implement property $folder');
        }
        
        return new Folder(WWW_ROOT . $this->folder, true, 0755);
    }
    
    /**
     * @return array list mime-types accepts.
     */
    public function acceptMimeTypes(): array
    {
        if (!$this->mimeTypes) {
            throw new \Exception('implement property $mimeTypes');
        }
        
        return $this->mimeTypes;
    }
    
    /**
     * 
     * @param File $file
     * @param array $mimeTypes
     * @return bool
     * @throws \Exception
     */
    public function handleMimeType(File $file, array $mimeTypes): bool
    {
        if (!in_array($file->mime(), $mimeTypes)) {
            throw new \Exception('mime type not allowed');
        }

        return true;
    }
    
    /**
     * @param string $file
     * @return File
     */
    public function file(string $file): File
    {
        return new File($file);
    }
    
    /**
     * 
     * @param File $file
     * @return File
     */
    public function handleFile(File $file): File
    {
        try {
            $this->handleMimeType($file, $this->acceptMimeTypes());
            
            return $file;
            
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
    
    /**
     * 
     * @param File $file
     * @param Folder $folder
     * @return bool
     * @throws \Exception
     */
    public function upload(File $file, Folder $folder): bool
    {
        try {
            $newName = 'Product_'.uniqid().$this->ext[$file->mime()];
            $file->copy($folder->path . $newName);

            $this->file = new File($folder->path . $newName, true, 0644);
            
            return true;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
    
    /**
     * 
     * @return string path relative file
     * @throws \Exception
     */
    public function getPath(): string
    {
        if (!$this->file) {
            throw new \Exception('File not found');
        }
        
        return DS . $this->folder . $this->file->name;
    }
    
    /**
     * 
     * @param string $path
     * @return bool
     */
    public function delete(string $path): bool 
    {
        if (!unlink(WWW_ROOT . $path)) {
            return false;
        }
        
        return true;
    }
}

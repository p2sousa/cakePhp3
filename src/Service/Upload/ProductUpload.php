<?php


namespace App\Service\Upload;

/**
 * Description of ProductUpload
 *
 * @author pablosousa
 */
class ProductUpload implements UploadInterface
{
    use FileUploadTrait;
    
    public function __construct()
    {
        $this->folder = 'Uploads' . DS;
        $this->mimeTypes = [
            'image/jpeg',
            'image/png',
            'image/gif'
        ];
    }

}

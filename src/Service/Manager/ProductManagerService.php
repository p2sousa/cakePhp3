<?php

namespace App\Service\Manager;

use App\Controller\ProductsController;
use App\Model\Entity\Product;
use App\Service\Upload\ProductUpload;

/**
 *  ProductManagerService
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 * @package App\Service\Manager
 */
class ProductManagerService
{
    /**
     *
     * @var ProductsController
     */
    private $service;
    
    /**
     *
     * @var Product 
     */
    private $product;
    
    /**
     * construct class
     * 
     * @param ProductsController $product
     */
    public function __construct(ProductsController $product)
    {
        $this->service = $product;
    }
    
    /**
     * creates a new product
     * 
     * @return Product
     * @throws \Exception
     */
    public function create(): Product
    {
        if (!$this->service->request->getData()) {
            throw new \Exception('the data was not sent.');
        }
        
        $this->product = $this->service->Products->newEntity();
        
        $requestData = $this->service->request->getData();
        
        $requestData['image'] = $this->upload();
        
        $this->product = $this->service->Products->patchEntity(
            $this->product, 
            $requestData
        );

        if (!$this->service->Products->save($this->product)) {
            throw new \Exception(
                'The product could not be saved. Please, try again.'
            );
        }
        
        return $this->product;
    }
    
    /**
     * update a product.
     * 
     * @return Product
     * @throws \Exception
     */
    public function update(): Product
    {
        if (!$this->service->request->getData()) {
            throw new \Exception('the data was not sent.');
        }
        
        if (!$this->product) {
            throw new \Exception('Product are null.');
        }
        
        $requestData = $this->service->request->getData();
        
        $requestData['image'] = $this->upload();
        
        $this->product = $this->service->Products->patchEntity(
            $this->product, 
            $requestData
        );

        if (!$this->service->Products->save($this->product)) {
            throw new \Exception(
                'The product could not be saved. Please, try again.'
            );
        }
        
        return $this->product;
    }
    
    /**
     * delete a product
     * 
     * @return bool
     * @throws \Exception
     */
    public function delete(): bool
    {
        if (!$this->product) {
            throw new \Exception('Product are null.');
        }
        
        $upload = new ProductUpload();
            
        if ($this->product->image) {
            $upload->delete($this->product->image);
        }
        
        if (!$this->service->Products->delete($this->product)) {
            throw new \Exception(
                'The product could not be deleted. Please, try again.'
            );
        }
        
        return true;
    }
    
    /**
     * 
     * @return string|null
     * @throws \Exception
     */
    public function upload(): ?string
    {
        try {
            if (!$this->service->request->getData('image.tmp_name')) {
                throw new \Exception('file not sent');
            }
            
            $filename = $this->service->request->getData('image.tmp_name');

            $upload = new ProductUpload();
            
            if ($this->product->image) {
                $upload->delete($this->product->image);
            }

            $folder = $upload->createFolder();
            $file = $upload->handleFile(
                $upload->file($filename)
            );

            $upload->upload($file, $folder);

            return $upload->getPath();
        } catch (\Exception $exc) {
            debug($exc);die;
            return null;
        }
    }
    
    /**
     * set current Product
     * 
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function setProduct(int $id): void
    {
        $product = $this->service->Products->get($id, [
            'contain' => ['Tags']
        ]);
        
        
        if (!$product) {
            throw new \Exception('product not found.');
        }
        
        $this->product = $product;
    }

}

<?php

namespace App\Service\Manager;

use App\Controller\ProductsController;
use App\Model\Entity\Product;

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
        
        $this->product = $this->service->Products->patchEntity(
            $this->product, 
            $this->service->request->getData()
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
        
        $this->product = $this->service->Products->patchEntity(
            $this->product, 
            $this->service->request->getData()
        );

        if (!$this->service->Products->save($this->product)) {
            throw new \Exception(
                'The product could not be saved. Please, try again.'
            );
        }
        
        return $this->product;
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

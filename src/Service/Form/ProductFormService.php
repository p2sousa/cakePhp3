<?php

namespace App\Service\Form;

use App\Controller\ProductsController;
use App\Model\Entity\Product;

/**
 * ProductFormService
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 * @package App\Service\Form
 */
class ProductFormService
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
     * 
     * @return void
     */
    public function newForm(): void
    {
        $this->service->loadModel('Tags');
        
        $product = $this->service->Products->newEntity();
        $tags = $this->service->Tags->find('list')->toArray();
        
        $this->service->set(compact('product','tags'));
    }
    
    /**
     * 
     * @return void
     */
    public function editForm(): void
    {
        $this->service->loadModel('Tags');
        
        $product = $this->product;
        $tags = $this->service->Tags->find('list')->toArray();
        
        $this->service->set(compact('product','tags'));
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

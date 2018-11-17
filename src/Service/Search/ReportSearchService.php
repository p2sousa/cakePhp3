<?php

namespace App\Service\Search;

use App\Controller\AppController;
use App\Model\Entity\ProductsTag;

/**
 * TagSearchService
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 * @package App\Service\Search
 */
class ReportSearchService
{
    /**
     *
     * @var AppController
     */
    private $service;
    
    /**
     * 
     * @param ProductsTag
     */
    private $productsTag;
    
    /**
     * construct class
     * 
     * @param AppController $service
     */
    public function __construct(AppController $service)
    {
        $this->service = $service;
    }
    
    /**
     * search the most used tags in products.
     * 
     * @return void 
     */
    public function mostUsed(): void
    {
        $this->service->loadModel('ProductsTags');
        
        $tagsMostUsed = $this->service->ProductsTags->findTagsMostUsed(10);
        
        $this->service->set(compact('tagsMostUsed'));
    }
}

<?php

namespace App\Test\TestCase\Service\Search;

use App\Service\Search\ReportSearchService;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Service\Search\ReportSearchService Test Case
 */
class ReportSearchServiceTest extends TestCase
{
    public $controller = null;
    
    public function setUp()
    {
        parent::setUp();
        
        $request = new ServerRequest();
        $response = new Response();
        $request->getSession()->write('UserLogged.ID', 1);
        
        $this->controller = $this->getMockBuilder('App\Controller\AppController')
            ->setConstructorArgs([$request, $response])
            ->setMethods(null)
            ->getMock();
    }
    
    public function tearDown()
    {
        parent::tearDown();
        // Clean up after we're done
        unset($this->controller);
    }
    
    public function testMostUsed()
    {
        $report = new ReportSearchService($this->controller);
        
        $this->assertInstanceOf(
            ReportSearchService::class, 
            $report
        );
    }
}

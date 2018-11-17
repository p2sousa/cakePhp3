<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Service\Search\ReportSearchService;

/**
 * Reports Controller
 *
 *
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        try {
            $tagSearch = new ReportSearchService($this);
            $tagSearch->mostUsed();
        } catch (\Exception $exc) {
            $this->Flash->error(
                __($exc->getMessage())
            );
        }
    }
}

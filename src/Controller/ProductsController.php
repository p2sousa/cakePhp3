<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Service\Form\ProductFormService;
use App\Service\Manager\ProductManagerService;
use Cake\Http\Response;

/**
 * Products Controller
 *
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('default');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index(): void
    {      
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(string $id = null): void
    {
        $product = $this->Products->get($id, [
            'contain' => ['Tags']
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        try {
            if ($this->request->is('post')) {
                
                $productManager = new ProductManagerService($this);
                $productManager->create();
                
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            
        } catch (\Exception $exc) {
            $this->Flash->error(
                __($exc->getMessage())
            );
        }
        
        $productForm = new ProductFormService($this);
        $productForm->newForm();
    }

    /**
     * Edit method
     *
     * @param int|null $id Product id.
     * @return Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit(int $id = null)
    {
        try {
            if ($this->request->is(['patch', 'post', 'put'])) {
                
                $productManager = new ProductManagerService($this);
                $productManager->setProduct($id);
                $productManager->update();
                
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
        } catch (\Exception $exc) {
            $this->Flash->error(
                __($exc->getMessage())
            );
        }
        
        $productForm = new ProductFormService($this);
        $productForm->setProduct($id);
        $productForm->editForm();
    }

    /**
     * Delete method
     *
     * @param int $id Product id.
     * @return Response Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(int $id): Response
    {
        try {
            $this->request->allowMethod(['post', 'delete']);
                
            $productManager = new ProductManagerService($this);
            $productManager->setProduct($id);
            $productManager->delete();

            $this->Flash->success(__('The product has been deleted.'));
        } catch (\Exception $exc) {
            $this->Flash->error(
                __($exc->getMessage())
            );
        } finally {
            return $this->redirect(['action' => 'index']);
        }
    }

}

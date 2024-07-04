<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Testtypes Controller
 *
 * @property \App\Model\Table\TesttypesTable $Testtypes
 */
class TesttypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Testtypes->find();
        $testtypes = $this->paginate($query);

        $this->set(compact('testtypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Testtype id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testtype = $this->Testtypes->get($id, contain: ['Tests']);
        $this->set(compact('testtype'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testtype = $this->Testtypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $testtype = $this->Testtypes->patchEntity($testtype, $this->request->getData());
            if ($this->Testtypes->save($testtype)) {
                $this->Flash->success(__('The testtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The testtype could not be saved. Please, try again.'));
        }
        $this->set(compact('testtype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Testtype id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testtype = $this->Testtypes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testtype = $this->Testtypes->patchEntity($testtype, $this->request->getData());
            if ($this->Testtypes->save($testtype)) {
                $this->Flash->success(__('The testtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The testtype could not be saved. Please, try again.'));
        }
        $this->set(compact('testtype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Testtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testtype = $this->Testtypes->get($id);
        if ($this->Testtypes->delete($testtype)) {
            $this->Flash->success(__('The testtype has been deleted.'));
        } else {
            $this->Flash->error(__('The testtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

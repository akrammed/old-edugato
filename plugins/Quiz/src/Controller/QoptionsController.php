<?php
declare(strict_types=1);

namespace Quiz\Controller;

use Quiz\Controller\AppController;

/**
 * Qoptions Controller
 *
 * @property \Quiz\Model\Table\QoptionsTable $Qoptions
 */
class QoptionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Qoptions->find();
        $qoptions = $this->paginate($query);

        $this->set(compact('qoptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Qoption id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $qoption = $this->Qoptions->get($id, contain: []);
        $this->set(compact('qoption'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $qoption = $this->Qoptions->newEmptyEntity();
        if ($this->request->is('post')) {
            $qoption = $this->Qoptions->patchEntity($qoption, $this->request->getData());
            if ($this->Qoptions->save($qoption)) {
                $this->Flash->success(__('The qoption has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The qoption could not be saved. Please, try again.'));
        }
        $this->set(compact('qoption'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Qoption id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $qoption = $this->Qoptions->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $qoption = $this->Qoptions->patchEntity($qoption, $this->request->getData());
            if ($this->Qoptions->save($qoption)) {
                $this->Flash->success(__('The qoption has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The qoption could not be saved. Please, try again.'));
        }
        $this->set(compact('qoption'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Qoption id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $qoption = $this->Qoptions->get($id);
        if ($this->Qoptions->delete($qoption)) {
            $this->Flash->success(__('The qoption has been deleted.'));
        } else {
            $this->Flash->error(__('The qoption could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Candostatments Controller
 *
 * @property \App\Model\Table\CandostatmentsTable $Candostatments
 */
class CandostatmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Candostatments->find()
            ->contain(['Learningpaths']);
        $candostatments = $this->paginate($query);

        $this->set(compact('candostatments'));
    }

    /**
     * View method
     *
     * @param string|null $id Candostatment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candostatment = $this->Candostatments->get($id, contain: ['Learningpaths', 'Shorts']);
        $this->set(compact('candostatment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candostatment = $this->Candostatments->newEmptyEntity();
        if ($this->request->is('post')) {
            $candostatment = $this->Candostatments->patchEntity($candostatment, $this->request->getData());
            if ($this->Candostatments->save($candostatment)) {
                $this->Flash->success(__('The candostatment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candostatment could not be saved. Please, try again.'));
        }
        $learningpaths = $this->Candostatments->Learningpaths->find('list', limit: 200)->all();
        $this->set(compact('candostatment', 'learningpaths'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Candostatment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candostatment = $this->Candostatments->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candostatment = $this->Candostatments->patchEntity($candostatment, $this->request->getData());
            if ($this->Candostatments->save($candostatment)) {
                $this->Flash->success(__('The candostatment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candostatment could not be saved. Please, try again.'));
        }
        $learningpaths = $this->Candostatments->Learningpaths->find('list', limit: 200)->all();
        $this->set(compact('candostatment', 'learningpaths'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Candostatment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candostatment = $this->Candostatments->get($id);
        if ($this->Candostatments->delete($candostatment)) {
            $this->Flash->success(__('The candostatment has been deleted.'));
        } else {
            $this->Flash->error(__('The candostatment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

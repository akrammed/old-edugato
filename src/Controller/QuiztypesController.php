<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Quiztypes Controller
 *
 * @property \App\Model\Table\QuiztypesTable $Quiztypes
 */
class QuiztypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Quiztypes->find();
        $quiztypes = $this->paginate($query);

        $this->set(compact('quiztypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Quiztype id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quiztype = $this->Quiztypes->get($id, contain: ['Quizs']);
        $this->set(compact('quiztype'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quiztype = $this->Quiztypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $quiztype = $this->Quiztypes->patchEntity($quiztype, $this->request->getData());
            if ($this->Quiztypes->save($quiztype)) {
                $this->Flash->success(__('The quiztype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quiztype could not be saved. Please, try again.'));
        }
        $this->set(compact('quiztype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quiztype id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quiztype = $this->Quiztypes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quiztype = $this->Quiztypes->patchEntity($quiztype, $this->request->getData());
            if ($this->Quiztypes->save($quiztype)) {
                $this->Flash->success(__('The quiztype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quiztype could not be saved. Please, try again.'));
        }
        $this->set(compact('quiztype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quiztype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quiztype = $this->Quiztypes->get($id);
        if ($this->Quiztypes->delete($quiztype)) {
            $this->Flash->success(__('The quiztype has been deleted.'));
        } else {
            $this->Flash->error(__('The quiztype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

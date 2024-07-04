<?php
declare(strict_types=1);

namespace Quiz\Controller;

use Quiz\Controller\AppController;

/**
 * Qquestions Controller
 *
 * @property \Quiz\Model\Table\QquestionsTable $Qquestions
 */
class QquestionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Qquestions->find();
        $qquestions = $this->paginate($query);

        $this->set(compact('qquestions'));
    }

    /**
     * View method
     *
     * @param string|null $id Qquestion id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $qquestion = $this->Qquestions->get($id, contain: []);
        $this->set(compact('qquestion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $qquestion = $this->Qquestions->newEmptyEntity();
        if ($this->request->is('post')) {
            $qquestion = $this->Qquestions->patchEntity($qquestion, $this->request->getData());
            if ($this->Qquestions->save($qquestion)) {
                $this->Flash->success(__('The qquestion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The qquestion could not be saved. Please, try again.'));
        }
        $this->set(compact('qquestion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Qquestion id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $qquestion = $this->Qquestions->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $qquestion = $this->Qquestions->patchEntity($qquestion, $this->request->getData());
            if ($this->Qquestions->save($qquestion)) {
                $this->Flash->success(__('The qquestion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The qquestion could not be saved. Please, try again.'));
        }
        $this->set(compact('qquestion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Qquestion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $qquestion = $this->Qquestions->get($id);
        if ($this->Qquestions->delete($qquestion)) {
            $this->Flash->success(__('The qquestion has been deleted.'));
        } else {
            $this->Flash->error(__('The qquestion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

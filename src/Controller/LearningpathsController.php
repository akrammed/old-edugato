<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Learningpaths Controller
 *
 * @property \App\Model\Table\LearningpathsTable $Learningpaths
 */
class LearningpathsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Learningpaths->find();
        $learningpaths = $this->paginate($query);

        $this->set(compact('learningpaths'));
    }

    /**
     * View method
     *
     * @param string|null $id Learningpath id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $learningpath = $this->Learningpaths->get($id, contain: ['Candostatments']);
        $this->set(compact('learningpath'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $learningpath = $this->Learningpaths->newEmptyEntity();
        if ($this->request->is('post')) {
            $learningpath = $this->Learningpaths->patchEntity($learningpath, $this->request->getData());
            if ($this->Learningpaths->save($learningpath)) {
                $this->Flash->success(__('The learningpath has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The learningpath could not be saved. Please, try again.'));
        }
        $this->set(compact('learningpath'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Learningpath id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $learningpath = $this->Learningpaths->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $learningpath = $this->Learningpaths->patchEntity($learningpath, $this->request->getData());
            if ($this->Learningpaths->save($learningpath)) {
                $this->Flash->success(__('The learningpath has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The learningpath could not be saved. Please, try again.'));
        }
        $this->set(compact('learningpath'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Learningpath id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $learningpath = $this->Learningpaths->get($id);
        if ($this->Learningpaths->delete($learningpath)) {
            $this->Flash->success(__('The learningpath has been deleted.'));
        } else {
            $this->Flash->error(__('The learningpath could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

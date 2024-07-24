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
        $this->viewBuilder()->setLayout('admin-layout');
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
        $this->viewBuilder()->setLayout('add-layout');
        $learningpath = $this->Learningpaths->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $uploadResult = $this->upload($data,'picture','learningpaths');
            if (isset($data['is_free']) && $data['is_free'] == 1) {
                $this->Learningpaths->updateAll(['is_free' => 0], ['is_free' => 1]);
            }
            $data = $uploadResult['data'];
            $learningpath = $this->Learningpaths->patchEntity($learningpath, $data);
            $result = $this->Learningpaths->save($learningpath);
            if ($result) {
                $this->Flash->success(__('The learning path has been saved.'));

                return $this->redirect(['action' => 'add']);
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
        $this->viewBuilder()->setLayout('admin-layout');
        $learningpath = $this->Learningpaths->get($id, ['contain' => []]);
    
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            
            if ($data['picture']->getError() === UPLOAD_ERR_NO_FILE) {
                unset($data['picture']);
            } else {
                $data = $this->upload($data, 'picture', 'learningpaths');
            }
    
            if (isset($data['is_free']) && $data['is_free'] == 1) {
                $this->Learningpaths->updateAll(['is_free' => 0], ['is_free' => 1]);
            }
    
            $learningpath = $this->Learningpaths->patchEntity($learningpath, $data);
            
            if ($this->Learningpaths->save($learningpath)) {
                $this->Flash->success(__('The learning path has been saved.'));
    
                return $this->redirect(['action' => 'index']);
            }
            
            $this->Flash->error(__('The learning path could not be saved. Please, try again.'));
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
            $this->Flash->error(__('The learning path could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
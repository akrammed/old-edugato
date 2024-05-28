<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ShortTypes Controller
 *
 * @property \App\Model\Table\ShortTypesTable $ShortTypes
 */
class ShortTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ShortTypes->find()
            ->contain(['Users']);
        $shortTypes = $this->paginate($query);

        $this->set(compact('shortTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Short Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shortType = $this->ShortTypes->get($id, contain: ['Users', 'Shorts']);
        $this->set(compact('shortType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shortType = $this->ShortTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $shortType = $this->ShortTypes->patchEntity($shortType, $this->request->getData());
            if ($this->ShortTypes->save($shortType)) {
                $this->Flash->success(__('The short type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The short type could not be saved. Please, try again.'));
        }
        $users = $this->ShortTypes->Users->find('list', limit: 200)->all();
        $this->set(compact('shortType', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Short Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shortType = $this->ShortTypes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shortType = $this->ShortTypes->patchEntity($shortType, $this->request->getData());
            if ($this->ShortTypes->save($shortType)) {
                $this->Flash->success(__('The short type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The short type could not be saved. Please, try again.'));
        }
        $users = $this->ShortTypes->Users->find('list', limit: 200)->all();
        $this->set(compact('shortType', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Short Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shortType = $this->ShortTypes->get($id);
        if ($this->ShortTypes->delete($shortType)) {
            $this->Flash->success(__('The short type has been deleted.'));
        } else {
            $this->Flash->error(__('The short type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

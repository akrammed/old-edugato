<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Homes Controller
 *
 */
class HomesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Homes->find();
        $homes = $this->paginate($query);

        $this->set(compact('homes'));
    }

    /**
     * View method
     *
     * @param string|null $id Home id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $home = $this->Homes->get($id, contain: []);
        $this->set(compact('home'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $home = $this->Homes->newEmptyEntity();
        if ($this->request->is('post')) {
            $home = $this->Homes->patchEntity($home, $this->request->getData());
            if ($this->Homes->save($home)) {
                $this->Flash->success(__('The home has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The home could not be saved. Please, try again.'));
        }
        $this->set(compact('home'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Home id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $home = $this->Homes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $home = $this->Homes->patchEntity($home, $this->request->getData());
            if ($this->Homes->save($home)) {
                $this->Flash->success(__('The home has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The home could not be saved. Please, try again.'));
        }
        $this->set(compact('home'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Home id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $home = $this->Homes->get($id);
        if ($this->Homes->delete($home)) {
            $this->Flash->success(__('The home has been deleted.'));
        } else {
            $this->Flash->error(__('The home could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

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
    public function index($id)
    {
        $currentSessionUser = $this->Authentication->getIdentity()->getOriginalData();
        $isAdmin = ($currentSessionUser ? $currentSessionUser->role_id : null) === 2;
        $this->viewBuilder()->setLayout($isAdmin ? 'new-admin-layout' : 'dashboard-layout');
        $this->set('layer', 'admin');
        $this->set('sidebar', $isAdmin ? 'dashboard/admin-aside' : 'dashboard/aside');
        $this->set('altBackground', !$isAdmin);
        $candostatment = $this->Candostatments->newEmptyEntity();
        $learningpath = $this->Candostatments->Learningpaths->get($id, contain: ['Candostatments']);
        $query = $this->Candostatments->find()
            ->contain(['Learningpaths','Shorts'])->where(['learningpath_id'=> $id]);
        $candostatments = $this->paginate($query);
        $this->set(compact('learningpath','candostatment','candostatments'));
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

        $this->viewBuilder()->setLayout('admin-layout');
        $candostatment = $this->Candostatments->newEmptyEntity();
        if ($this->request->is('post')) {
            $data =  $this->request->getData();
            $candostatment = $this->Candostatments->patchEntity($candostatment,$data);
            if ($this->Candostatments->save($candostatment)) {
                $this->Flash->success(__('The can do statment has been saved.'));

                return $this->redirect(['action' => 'index',$data['learningpath_id']]);
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
            $data =  $this->request->getData();
            $candostatment = $this->Candostatments->patchEntity($candostatment, $data);
            if ($this->Candostatments->save($candostatment)) {
                $this->Flash->success(__('The can do statment has been saved.'));

                return $this->redirect(['action' => 'index',$data['learningpath_id']]);
            }
            $this->Flash->error(__('The can do statment could not be saved. Please, try again.'));
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

        return $this->redirect(['action' => 'index',$candostatment->learningpath_id]);
    }
}

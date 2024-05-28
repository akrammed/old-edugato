<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * Shorts Controller
 *
 * @property \App\Model\Table\ShortsTable $Shorts
 */
class ShortsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('temp-panel');
        $query = $this->Shorts->find()
            ->contain(['ShortTypes']);
        $shorts = $this->paginate($query);

        $this->set(compact('shorts'));
    }

    /**
     * View method
     *
     * @param string|null $id Short id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $short = $this->Shorts->get($id, contain: ['ShortTypes']);
        $this->set(compact('short'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $short = $this->Shorts->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data = $this->upload($data,'video','video');
          
            $short = $this->Shorts->patchEntity($short, $data);
            if ($this->Shorts->save($short)) {
                $this->Flash->success(__('The short has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The short could not be saved. Please, try again.'));
        }
        $shortTypes = $this->Shorts->ShortTypes->find('list', limit: 200)->all();
        $this->set(compact('short', 'shortTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Short id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $short = $this->Shorts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $short = $this->Shorts->patchEntity($short, $this->request->getData());
            if ($this->Shorts->save($short)) {
                $this->Flash->success(__('The short has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The short could not be saved. Please, try again.'));
        }
        $shortTypes = $this->Shorts->ShortTypes->find('list', limit: 200)->all();
        $this->set(compact('short', 'shortTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Short id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $short = $this->Shorts->get($id);
        if ($this->Shorts->delete($short)) {
            $this->Flash->success(__('The short has been deleted.'));
        } else {
            $this->Flash->error(__('The short could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function watch($id = null) {
        $this->viewBuilder()->setLayout('temp-short');
        $shortsList = $this->Shorts->find('all', [
            'order' => ['Shorts.id' => 'ASC'] 
        ])->toArray();
    
        if ($id !== null) {
            $shortsWithIdFirst = [];
            foreach ($shortsList as $short) {
                if ($short->id == $id) {
                    array_unshift($shortsWithIdFirst, $short);
                } else {
                    $shortsWithIdFirst[] = $short;
                }
            }
            $shortsList = $shortsWithIdFirst;
        }
        
        $this->set(compact('shortsList'));
    }

    public function getShortAjax(){
        $this->autoRender = false;
        $id = $this->request->getData();
        $short = $this->Shorts->get($id);
        $response = new Response();
        $response = $response->withType('application/json')
        ->withStringBody(json_encode($short));
    return $response;
    }
    
}

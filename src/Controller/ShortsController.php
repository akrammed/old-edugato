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
        $this->viewBuilder()->setLayout('admin-layout');
        $short = $this->Shorts->get($id);
        $this->set(compact('short'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('admin-layout');
        $short = $this->Shorts->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if (isset($data['video'])) {
                $data = $this->upload($data, 'video', 'video');
                
            } else {
                unset($data['video']);
            }
            $short = $this->Shorts->patchEntity($short, $data);
            if ($this->Shorts->save($short)) {
                $this->Flash->success(__('The short has been saved.'));
                $candostatment = $this->Shorts->Candostatments->get($data['candostatment_id'], contain: ['Learningpaths', 'Shorts']);
                return $this->redirect(['controller'=>"candostatments",'action' => 'index',$candostatment->learningpath_id]);
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
        
        $this->viewBuilder()->setLayout('admin-layout');
        $short = $this->Shorts->get($id, contain: ['Candostatments']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['title'] = $short['title'];
            if (isset($data['video'])) {
                $data = $this->upload($data, 'video', 'video');
                
            } else {
                unset($data['video']);
            }
            if ($data['status']) {
                $short = $this->Shorts->patchEntity($short, $data['data']);
                $quizResult = $this->createQuiz($data['data']);
                if ($this->Shorts->save($short)) {
                    $this->Flash->success(__('The short has been saved.'));
                    $candostatment = $short['candostatment'];
                    return $this->redirect(['controller'=>"candostatments",'action' => 'index',$candostatment->learningpath_id]);
                }
                $this->Flash->error(__('The short could not be saved. Please, try again.'));
            }    }
        $shortTypes = $this->Shorts->ShortTypes->find('list', limit: 200)->all();
        $candostatmentId = $short['candostatment']->id;
        $this->set(compact('short', 'shortTypes','candostatmentId'));
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

        /**
     * Delete method
     *
     * @param string|null $id Short id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteFromCanDo($id = null, $lp = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $short = $this->Shorts->get($id);
        if ($this->Shorts->delete($short)) {
            $this->Flash->success(__('The short has been deleted.'));
        } else {
            $this->Flash->error(__('The short could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'candostatments','action' => 'index',$lp]);
    }

    public function watch($id = null)
    {
        $this->viewBuilder()->setLayout('short-layout');
        $shortsList = $this->Shorts->find('list', [
            'keyField' => 'id',
            'valueField' => 'id',
            'order' => ['Shorts.id' => 'ASC']
        ])->toArray();

        if ($id !== null) {
            $shortsWithIdFirst = [];
            foreach ($shortsList as $short) {
                if ($short == $id) {
                    array_unshift($shortsWithIdFirst, $short);
                } else {
                    $shortsWithIdFirst[] = $short;
                }
            }
            $shortsList = $shortsWithIdFirst;
        } else {
            $shortsList = array_values($shortsList);
        }
        // dd($shortsList);
        $this->set(compact('shortsList'));
    }

    public function getShortAjax()
    {
        $this->autoRender = false;
        $id = $this->request->getData();
        $short = $this->Shorts->get($id);
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($short));
        return $response;
    }
}
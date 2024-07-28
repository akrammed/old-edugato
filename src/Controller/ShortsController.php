<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;
use Cake\ORM\TableRegistry;

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
        $questionsTable = TableRegistry::getTableLocator()->get('questions');
        $optionsTable  = TableRegistry::getTableLocator()->get('options');
        $quizsTable  = TableRegistry::getTableLocator()->get('quizs');
        $short = $this->Shorts->get($id);
        $quiz = $quizsTable->get($short['quiz_id']);
        $options = $optionsTable->find()->where(['quiz_id' => $short['quiz_id']])->toArray();
        $questions = $questionsTable->find()->where(['quiz_id' => $short['quiz_id']])->toArray();
        $this->set(compact(['short', 'quiz', 'options', 'questions']));
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
                $data = $data['video']->getClientFilename();
            } else {
                unset($data['video']);
            }
            $short = $this->Shorts->patchEntity($short, $data);
            if ($this->Shorts->save($short)) {
                $this->Flash->success(__('The short has been saved.'));
                $candostatment = $this->Shorts->Candostatments->get($data['candostatment_id'], contain: ['Learningpaths', 'Shorts']);
                return $this->redirect(['controller' => "candostatments", 'action' => 'index', $candostatment->learningpath_id]);
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

        $currentSessionUser = $this->Authentication->getIdentity()->getOriginalData();
        $isAdmin = ($currentSessionUser ? $currentSessionUser->role_id : null) === 2;
        $this->viewBuilder()->setLayout($isAdmin ? 'new-admin-layout' : 'dashboard-layout');
        $this->set('layer', 'admin');
        $this->set('sidebar', $isAdmin ? 'dashboard/admin-aside' : 'dashboard/aside');
        $this->set('altBackground', !$isAdmin);
        $short = $this->Shorts->get($id, contain: ['Candostatments']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['title'] = $short['title'];
            if (isset($data['video'])) {
                $data['video'] = $data['video']->getClientFilename();
            } else {
                unset($data['video']);
            }
            $short = $this->Shorts->patchEntity($short, $data);
            $quizResult = $this->createQuiz($data);
            $short->quiz_id = $quizResult['id'];
            if ($this->Shorts->save($short)) {
                $this->Flash->success(__('The short has been saved.'));
                $candostatment = $short['candostatment'];
                return $this->redirect(['controller' => "candostatments", 'action' => 'index', $candostatment->learningpath_id]);
            }
            $this->Flash->error(__('The short could not be saved. Please, try again.'));
        }


        $shortTypes = $this->Shorts->ShortTypes->find('list', limit: 200)->all();
        $candostatmentId = $short['candostatment']->id;
        $this->set(compact('short', 'shortTypes', 'candostatmentId'));
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

        return $this->redirect(['controller' => 'candostatments', 'action' => 'index', $lp]);
    }

    public function watch($candoId = null)
    {
        $this->viewBuilder()->setLayout('dashboard-layout');
        $this->set('layer', 'shorts');
        $this->set('sidebar', 'dashboard/aside');
        $this->set('altBackground', true);
    
        $courseUserTable = TableRegistry::getTableLocator()->get('CoursesUsers');
        $CandostatmentsTable = TableRegistry::getTableLocator()->get('Candostatments');
        $shortsTable = TableRegistry::getTableLocator()->get('Shorts');
        $learningpathsTable = TableRegistry::getTableLocator()->get('Learningpaths');
        $quizzesTable = TableRegistry::getTableLocator()->get('Quizs');
        $questionsTable = TableRegistry::getTableLocator()->get('Questions');
        $optionsTable = TableRegistry::getTableLocator()->get('Options');
    
        $currentSessionUser = $this->Authentication->getIdentity()->getOriginalData();
        $userId = $currentSessionUser ? $currentSessionUser->id : null;
    
        if ($candoId !== null) {
            $where['id'] = $candoId;
        } else {
            $learningPaths = $learningpathsTable->find()->where(['is_free IS' => 1])->first();
            $where = !empty($learningPaths) ? ['learningpath_id IS' => $learningPaths->id] : '';
        }
    
        $candostatments = $CandostatmentsTable->find()->contain(['Shorts'])->where($where)->first();
        $shorts = $shortsTable->find()->where(['candostatment_id IS' => $candoId])->toArray();
    
        // Fetch quizzes, questions, and options for each short
        foreach ($shorts as $short) {
            if (!empty($short->quiz_id)) {
                $quiz = $quizzesTable->get($short->quiz_id);
                $questions = $questionsTable->find()->where(['quiz_id' => $short->quiz_id])->toArray();
                $options = $optionsTable->find()->where(['quiz_id' => $short->quiz_id])->toArray();
                
                // Adding questions and options to the quiz object
                $quiz->questions = $questions;
                $quiz->options = $options;
    
                $short->quiz = $quiz;
            } else {
                $short->quiz = null;
            }
        }
        $this->set(compact(['candostatments', 'shorts']));
    }

    public function getQuizAjax()
    {
        $this->autoRender = false;
        $questionsTable = TableRegistry::getTableLocator()->get('questions');
        $optionsTable  = TableRegistry::getTableLocator()->get('options');
        $id = $this->request->getData();
        $quiz = $this->Quizs->get($id);
        $options = $optionsTable->find()->where(['quiz_id' => $id])->toArray();
        $questions = $questionsTable->find()->where(['quiz_id' => $id])->toArray();
        $responseData = [
            'quiz' => $quiz,
            'options' => $options,
            'questions' => $questions
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }

    public function uploadShortVidAjax()
    {
        $this->autoRender = false;
        $file = $this->request->getData('file');
        $data['video'] = $file;

        $data = $this->upload($data, 'video', 'video');
        $responseArray = [
            'status' => $data['status']
        ];

        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseArray));
        return $response;
    }
}
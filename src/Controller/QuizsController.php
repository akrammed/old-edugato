<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

/**
 * Quizs Controller
 *
 * @property \App\Model\Table\QuizsTable $Quizs
 */
class QuizsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Quizs->find()
            ->contain([]);
        $quizs = $this->paginate($query);

        $this->set(compact('quizs'));
    }

    /**
     * View method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $questionsTable = TableRegistry::getTableLocator()->get('questions');
        $optionsTable  = TableRegistry::getTableLocator()->get('options');
        $this->ViewBuilder()->setlayout('temp-quiz');
        $quiz = $this->Quizs->get($id);
        $options = $optionsTable->find()->where(['quiz_id' => $id])->toArray();
        $questions = $questionsTable->find()->where(['quiz_id' => $id])->toArray();
        
        $this->set(compact(['quiz','options','questions']));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quiz = $this->Quizs->newEmptyEntity();
        if ($this->request->is('post')) {
            $quiz = $this->Quizs->patchEntity($quiz, $this->request->getData());
            if ($this->Quizs->save($quiz)) {
                $this->Flash->success(__('The quiz has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quiz could not be saved. Please, try again.'));
        }
        $this->set(compact('quiz'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quiz = $this->Quizs->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quiz = $this->Quizs->patchEntity($quiz, $this->request->getData());
            if ($this->Quizs->save($quiz)) {
                $this->Flash->success(__('The quiz has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quiz could not be saved. Please, try again.'));
        }
        $this->set(compact('quiz'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quiz = $this->Quizs->get($id);
        if ($this->Quizs->delete($quiz)) {
            $this->Flash->success(__('The quiz has been deleted.'));
        } else {
            $this->Flash->error(__('The quiz could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function createAjax()
    {

        $this->autoRender = false;
        $chapetersTable = TableRegistry::getTableLocator()->get('Lms.Chapters');
        $this->loadComponent('HandelQuizCreate',
        ['path'=>'App\Controller\Component\HandelQuizCreate']
        );
        $data = $this->request->getData();
        $query = $this->request->getQuery();
        
        if(empty($data)){
            $data = $query;
        }
      
        $quizResult = $this->HandelQuizCreate->createQuiz($data);


        $quizResult['result'] = true; 
        $quizResult['source'] = 'short';
        if($data['lesson_id'] !== 'undefined' ){
            $quizResult['source'] = 'chapter';
            $chapter = $chapetersTable->newEmptyEntity();
            $chapter->quizz = $quizResult['id'];
            $chapter->quizz_title = $data['title'];
            $chapter->chapter = $data['title'];
            $chapter->lesson_id = $data['lesson_id'];
            $chapetersTable->save($chapter);
        }
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($quizResult));
        return $response;
    }

    public function uploadImgAjax()
    {

        $this->autoRender = false;
        $data = $this->request->getData('file');
        $name = $data->getClientFilename();
        $targetPath = WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . 'picture' . DS . $name;
        if ($data->getSize() > 0 && $data->getError() == 0) {
            $data->moveTo($targetPath);
        }
        $responseData = [
            'path' => $targetPath,
            'name' => $name,
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }

    public function upload($data,$field,$type){

        if ($this->request->is(['patch', 'post', 'put'])) {
            $postVid = $this->request->getData($field);
            $name = $postVid->getClientFilename();
                $targetPath = WWW_ROOT. DS .'img' .DS .'uploads'. DS .$type. DS . $name;
                    if ($postVid->getSize() > 0 && $postVid->getError() == 0) {
                        $postVid->moveTo($targetPath);
                        $data[$field] = $name;
                    }

                }
            return $data;
        }
}
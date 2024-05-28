<?php
declare(strict_types=1);

namespace Quiz\Controller;

use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\View\ViewBuilder;
use Migrations\Command\Phinx\Dump;
use Quiz\Controller\AppController;

/**
 * Quizs Controller
 *
 * @property \Quiz\Model\Table\QuizsTable $Quizs
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
        $questionsTable = TableRegistry::getTableLocator()->get('Quiz.qquestions');
        $optionsTable  = TableRegistry::getTableLocator()->get('Quiz.qoptions');
        $this->ViewBuilder()->setlayout('temp-vedio');
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
        $quizTypes = $this->Quizs->QuizTypes->find('list', limit: 200)->all();
        $this->set(compact('quiz', 'quizTypes'));
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
        $quizTypes = $this->Quizs->QuizTypes->find('list', limit: 200)->all();
        $this->set(compact('quiz', 'quizTypes'));
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
        $result = false;
        $message = '';
        $data = $this->request->getData();
        $query = $this->request->getQuery();
        if(empty($data)){
            $data = $query;
        }
            
        
        if($data['type']== 2){
            for ($i=1 ; $i < 5 ; $i++) { 
                $data = $this->upload($data,'option'.$i,'picture');
            }
        }
        if($data['type']== 9){
            for ($i=1 ; $i < 5 ; $i++) { 
                $data = $this->upload($data,'option'.$i,'video');
            }
        }
        
        $quiz = $this->Quizs->newEmptyEntity();
        $chapter = $chapetersTable->newEmptyEntity();
        $chapter->quizz_title = $data['title'];
        $quizData = [
            'title'=>$data['title'],
            'description'=>$data['description'],
            'quiztype_id'=>$data['type'],
        ];
        $quiz = $this->Quizs->patchEntity($quiz,$quizData);
        $result = $this->Quizs->save($quiz);
        $questionsTable = TableRegistry::getTableLocator()->get('Quiz.qquestions');
        $optionsTable  = TableRegistry::getTableLocator()->get('Quiz.qoptions');
        if ($result) {
            if ($data['optionCount'] > 0  && $data['type'] != 2) {
                foreach ($data['options'] as $key => $value) {
                    $emptyOption = [
                        'qoption' => null ,
                        'oorder' => null, 
                        'is_correct' => null, 
                        'palette' => null, 
                        'quiz_id' => null,
                    ];
                    $option = $optionsTable->newEmptyEntity();
                    $option = $optionsTable->patchEntity($option, $emptyOption);
                    $option->quiz_id = $quiz->id;
                    if($data['type'] == 4 ){
                        $option->qoption = $value;
                        $option->palette = $key;
                    }if($data['type'] == 1 || $data['type'] == 7){
                        $option->qoption = $key;
                        $option->is_correct = $value == 'true' ? 1 : 0;
                    }if($data['type'] == 6 ){
                        $option->qoption = $key;
                        $option->oorder = $value;
                    }
                    elseif($data['type'] != 1 && $data['type'] != 7){
                        $option->qoption = $value;
                        $option->oorder = $key;
                    }
                    
                    $optionsTable->save($option);
                }

            }if($data['type'] == 2){

                for ($i=1; $i < 5 ; $i++) { 
                $emptyOption = [
                    'qoption' => null ,
                    'oorder' => null, 
                    'is_correct' => null, 
                    'palette' => null, 
                    'quiz_id' => null,
                ];
                $option = $optionsTable->newEmptyEntity();
                $option = $optionsTable->patchEntity($option, $emptyOption);
                if($data['correctImg'] == $i){
                    $option->is_correct = 1 ;
                }
                $option->quiz_id = $quiz->id;
                $option->qoption = $data['option'.$i];
                $optionsTable->save($option);
            }
            }
            if ($data['questionCount'] > 0  && $data['type'] != 2 && $data['type'] != 6) {
                foreach ($data['question'] as $key => $value) {
                    $emptyOption = [
                        'question' => null ,
                        'is_correct' => null ,
                        'palette' => null, 
                        'oorder' => null, 
                        'quiz_id' => null,
                    ];
                    $question = $questionsTable->newEmptyEntity();
                    $question = $questionsTable->patchEntity($question, $emptyOption);
                    if($data['type'] == 4 ){
                        $question->question = $value;
                        $question->palette = $key;
                        $question->quiz_id = $quiz->id;
                    }if($data['type'] == 8){
                        $question->question = $value;
                        $question->oorder = $key;
                        $question->quiz_id = $quiz->id;
                    }elseif($data['type'] != 4){
                        $question->question = $key;
                        $question->is_correct = $value == 'true' ? 1 : 0;
                        $question->quiz_id = $quiz->id;
                    }
                    $questionsTable->save($question);
                } 
            }
            else{
                $emptyOption = [
                    'question' => null ,
                    'is_correct' => null ,
                    'palette' => null, 
                    'quiz_id' => null,
                ];   
                $question = $questionsTable->newEmptyEntity();
                $question = $questionsTable->patchEntity($question, $emptyOption);
                $question->quiz_id = $quiz->id;
                if($data['type'] == 6 ){
                    $question->question = $data['question'][0];
                }else{
                    $question->question = $data['questions'];
                }
                $questionsTable->save($question);
               
               
              
            }
          
            $chapter->quizz = $quiz->id;
            $chapter->chapter = $data['title'];
            $chapter->lesson_id = $data['lesson_id'];
            $chapetersTable->save($chapter);
            $result = true;
        }
        $responseData = [
            'result' => $result,
            'msg' => $message,
            'id' => $quiz['id']
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
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
}
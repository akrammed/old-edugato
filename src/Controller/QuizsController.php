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

        $this->viewBuilder()->setLayout('add-layout');
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

    public function upload($data,$field,$type)
    {
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

    public function checkOption()
    {
        $this->request->allowMethod(['post']);
        $this->autoRender = false;

        $session = $this->request->getSession();
        $currentStep = $session->read('current_step');
        $shortsData = $session->read('shorts_data');

        if (!empty($shortsData[$currentStep]['selected_option_id'])) {         
            return $this->response->withType('application/json')
                ->withStringBody(json_encode(['alreadyAnswered' => true]));
        }

        $optionId = $this->request->getData('id');
        $quizId = $this->request->getData('quizId');
        $optionsTable = TableRegistry::getTableLocator()->get('Options');
        $option = $optionsTable->get($optionId);
     
        $correctOption = $option->is_correct ? $optionId : ($optionsTable->find()
            ->where(['is_correct' => 1, 'quiz_id' => $quizId])
            ->first())['id'];
          
        $view = new \Cake\View\View($this->request, $this->response);
        $answerAlert = $view->element('Quiz-view/Elements/answer-alert', ['isCorrect' => $option->is_correct == 1]);
        
        $shortsData[$currentStep]['selected_option_id'] = $optionId;
        $shortsData[$currentStep]['correct_option_id'] = $correctOption;
        $session->write('shorts_data', $shortsData);

        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode(['correctOption' => $correctOption, 'answerAlert' => $answerAlert, 'navigable' => $currentStep < count($shortsData) - 1]));
        return $this->response;
    }

    public function checkVoice()
    {
        $this->request->allowMethod(['post']);
        $this->autoRender = false;

        $session = $this->request->getSession();
        $currentStep = $session->read('current_step');
        $shortsData = $session->read('shorts_data');
        $isCorrect = $this->request->getData('isCorrect');

        if (!empty($shortsData[$currentStep]['selected_option_id'])) {         
            return $this->response->withType('application/json')
                ->withStringBody(json_encode(['alreadyAnswered' => true]));
        }

        $optionId = $this->request->getData('id');
          
        $view = new \Cake\View\View($this->request, $this->response);
        $answerAlert = $view->element('Quiz-view/Elements/answer-alert', ['isCorrect' => $isCorrect == "true"]);
        
        $shortsData[$currentStep]['selected_option_id'] = $optionId;
        $shortsData[$currentStep]['correct_option_id'] = $isCorrect;
        $session->write('shorts_data', $shortsData);

        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode(['isCorrect' => $isCorrect == "true", 'answerAlert' => $answerAlert, 'navigable' => $currentStep < count($shortsData) - 1]));
        return $this->response;
    }

    public function checkOptionsOrder()
    {
        $this->autoRender = false;
        $session = $this->request->getSession();
        $data = $this->request->getData();
        $options = json_decode($data['options'], true);
        $currentStep = $session->read('current_step');
        $optionsTable  = TableRegistry::getTableLocator()->get('options');
        $shortsData = $session->read('shorts_data');
        $mismatchedOptions = [];

        if (!empty($shortsData[$currentStep]['selected_option_id'])) {         
            return $this->response->withType('application/json')
                ->withStringBody(json_encode(['alreadyAnswered' => true]));
        }
    
        foreach ($options as $o) {
            $option = $optionsTable->find()->where(['id' => $o['id']])->first();
            if ($option->oorder != $o['order']) {
                $mismatchedOptions[] = ['id' => $option->id, 'order' => $option->oorder, 'qoption' => $option->qoption] ;
            }
        }

        $shortsData[$currentStep]['selected_option_id'] = $options;
        $view = new \Cake\View\View($this->request, $this->response);
        $answerAlert = $view->element('Quiz-view/Elements/answer-alert', ['isCorrect' => !!empty($mismatchedOptions)]); 

        if (empty($mismatchedOptions)) {
            $shortsData[$currentStep]['correct_option_id'] = $options;
            $session->write('shorts_data', $shortsData);
            $responseData = [
                'status' => true,
                'navigable' => $currentStep < count($shortsData) - 1,
                'answerAlert' => $answerAlert
            ];
        } else {
            $mismatchedOptionIds = array_column($mismatchedOptions, 'id');
            $filteredOptions = array_filter($options, function($option) use ($mismatchedOptionIds) {
                return !in_array($option['id'], $mismatchedOptionIds);
            });
            $correctOptions = array_merge($filteredOptions, $mismatchedOptions);
            $shortsData[$currentStep]['correct_option_id'] = $correctOptions;
            $session->write('shorts_data', $shortsData);

            $responseData = [
                'status' => false,
                'navigable' => $currentStep < count($shortsData) - 1,
                'mismatchedOptions' => $mismatchedOptions,
                'answerAlert' => $answerAlert
            ];
        }

        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }

    public function retryQuiz() {
        $session = $this->request->getSession();
        $currentStep = $session->read('current_step');
        $shortsData = $session->read('shorts_data');

        // if ($shortsData[$currentStep]['attempts_left'] > 0) {
        $shortsData[$currentStep]['selected_option_id'] = null;
        $shortsData[$currentStep]['correct_option_id'] = null;
            // $shortsData[$currentStep]['attempts_left']--;
        $session->write('shorts_data', $shortsData);
        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode(['isRetryable' => true]));
        return $this->response;
        // } 

        // $this->response = $this->response->withType('application/json')
        //     ->withStringBody(json_encode(['isRetryable' => false]));
        // return $this->response;
    }

    public function navigate()
    {
        $this->request->allowMethod(['post']);
        $this->autoRender = false;

        $action = $this->request->getData('action');
        $session = $this->request->getSession();
        $currentStep = $session->read('current_step');
        $shortsData = $session->read('shorts_data');
    
        $view = new \Cake\View\View($this->request, $this->response);
  
        if ($action === 'next') {
            if ($currentStep < count($shortsData) - 1 && !!$shortsData[$currentStep]['selected_option_id']) {
                $currentStep++;
                $session->write('current_step', $currentStep);
                $currentShort = $session->read('shorts')[$currentStep];
                $currentShortData = $shortsData[$currentStep];
                $element = $view->element('Quiz-view/Elements/get-quiz-element', ['quizType' => $currentShort['quiz']['quiztype_id'], 'currentShortData' => $currentShortData, 'currentShort' => $currentShort]);
                $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['success' => true, 'element' => $element, 'videoUrl' => $currentShort['video'], 'navigable' => $currentStep < count($shortsData) - 1 && $currentShortData['selected_option_id']]));
                return $this->response;
            }
        }

        if ($action === 'prev') {
            if ($currentStep > 0) {
                $currentStep--;
                $session->write('current_step', $currentStep);
                $currentShort = $session->read('shorts')[$currentStep];
                $currentShortData = $session->read('shorts_data')[$currentStep];
                $element = $view->element('Quiz-view/Elements/get-quiz-element', ['quizType' => $currentShort['quiz']['quiztype_id'], 'currentShortData' => $currentShortData, 'currentShort' => $currentShort]);
                $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['success' => true, 'element' => $element, 'videoUrl' => $currentShort['video'], 'navigable' => $currentStep > 0]));
                return $this->response;
            }
        }

        $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['success' => false]));
        return $this->response;
    }
}
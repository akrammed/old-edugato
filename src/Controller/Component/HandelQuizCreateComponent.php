<?php

declare(strict_types=1);

namespace App\Controller\Component;

use App\Controller\AppController;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use SebastianBergmann\Environment\Console;

/**
 * HandelQuizCreate component
 *@param \App\Controller\QuizsController $quiz
 *@param \App\Controller\AppController $app
 *@var AppController $controller
 */


class HandelQuizCreateComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];
    protected $HandelUpload;

    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->HandelUpload = $this->getController()->loadComponent('HandelUpload');
    }
    
    public function initQuizShortData($data)
    {
        return  [
            'title' => 'short quiz',
            'quiztype_id' => $data['quiz_type']
        ];
    }
    public function initOptionData()
    {
        return  [
            'qoption' => null,
            'oorder' => null,
            'is_correct' => null,
            'quiz_id' => null,
        ];
    }
    public function initQuestionData()
    {
        return [
            'question' => null,
            'is_correct' => null,
            'oorder' => null,
            'quiz_id' => null,
        ];
    }

    public function patchOptionsEntity($optionsTable)
    {
        $emptyOption =  $this->initOptionData();
        $option = $optionsTable->newEmptyEntity();
        return $optionsTable->patchEntity($option, $emptyOption);
    }
    public function patchQuestionsEntity($questionsTable)
    {
        $emptyQuestion =  $this->initQuestionData();
        $question = $questionsTable->newEmptyEntity();
        return $questionsTable->patchEntity($question, $emptyQuestion);
    }
    public function saveQuiz($data, $quizsTable)
    {
        $quiz = $quizsTable->newEmptyEntity();
        $quizData = $this->initQuizShortData($data);
        $quiz = $quizsTable->patchEntity($quiz, $quizData);
        return  $quizsTable->save($quiz);
    }


    public function createQuiz($data)
    {

        
        $result = false;
        $message = 'Quiz was not created successfully';
        $questionsTable = TableRegistry::getTableLocator()->get('Questions');
        $optionsTable  = TableRegistry::getTableLocator()->get('Options');
        $quizsTable  = TableRegistry::getTableLocator()->get('Quizs');

        $quiz = $this->saveQuiz($data, $quizsTable);

        switch ($data['quiz_type']) {
            case 1:
                $question = $this->patchQuestionsEntity($questionsTable);
                $question->quiz_id = $quiz->id;
                $question->question = $data['question'];
                $questionsTable->save($question);
                foreach ($data['options'] as $key => $value) {
                    $option = $this->patchOptionsEntity($optionsTable);
                    if ($key == 0) {
                        $option->is_correct = 1;
                    } else {
                        $option->is_correct = 0;
                    }
                    $option->quiz_id = $quiz->id;
                    $option->qoption = $value;
                    if($optionsTable->save($option)){
                        $result = true;
                        $message = 'Quiz created successfully';
                    }
                }
                break;
            case 2:
                $question = $this->patchQuestionsEntity($questionsTable);
                $question->quiz_id = $quiz->id;
                $question->question = $data['question'];
                $questionsTable->save($question);
                
                foreach ($data['images'] as $key => $value) {
                    $name = $value->getClientFilename();
                    $targetPath = WWW_ROOT . 'img' . DS . 'uploads' . DS . 'picture' . DS . $name;
                
                    if ($value->getSize() > 0 && $value->getError() == 0) {
                        $value->moveTo($targetPath);
                        
                        $option = $this->patchOptionsEntity($optionsTable);
                        $option->is_correct = ($key == 0) ? 1 : 0;
                        $option->quiz_id = $quiz->id;
                        $option->qoption = $name;
                
                        if ($optionsTable->save($option)) {
                            $result = true;
                            $message = 'Quiz created successfully';
                        } else {
                            $result = false;
                            $message = 'Failed to save option';
                            break;
                        }
                    } else {
                        $result = false;
                        $message = 'Failed to upload image';
                        break;
                    }
                }
                
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
            case 7:
                break;
            case 8:
                break;
            case 9:
                break;
            default:
                break;
        }

        $responseData = [
            'result' => $result,
            'msg' => $message,
            'id' => $quiz['id']
        ];
        return $responseData;
    }




}
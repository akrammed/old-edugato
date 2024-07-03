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
 */


class HandelQuizCreateComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];


    public function initQuizData($data){
        return  [
            'title'=>$data['title'],
            'description'=>$data['description'],
            'quiztype_id'=>$data['type'],
        ];
    }
    public function initOptionData(){
        return  [
            'qoption' => null ,
            'oorder' => null, 
            'is_correct' => null, 
            'palette' => null, 
            'quiz_id' => null,
        ];

    }
    public function initQuestionData(){
        return [
            'question' => null ,
            'is_correct' => null ,
            'palette' => null, 
            'oorder' => null, 
            'quiz_id' => null,
        ];
    }

    public function patchOptionsEntity($data , $optionsTable ){
            $emptyOption =  $this->initOptionData();
            $option = $optionsTable->newEmptyEntity();
            return $optionsTable->patchEntity($option, $emptyOption);
    }
    public function patchQuestionsEntity($data , $questionsTable){
            $emptyQuestion =  $this->initQuestionData();
            $question = $questionsTable->newEmptyEntity();
            return $questionsTable->patchEntity($question, $emptyQuestion);
    }

    public function saveQuiz($data ,$quizsTable) {
            $quiz = $quizsTable->newEmptyEntity();
            $quizData = $this->initQuizData($data);
            $quiz = $quizsTable->patchEntity($quiz,$quizData);
            return  $quizsTable->save($quiz);
    }

    public function saveQuestionsData($data , $questionsTable , $quiz) {
        
        switch ($data['type']) {
            case 2:
                $question = $this->patchQuestionsEntity($data ,$questionsTable);
                $question->quiz_id = $quiz->id;
                $question->question = $data['questions'];
                $questionsTable->save($question);
                break;
            case 6:
                $question = $this->patchQuestionsEntity($data ,$questionsTable);
                $question->quiz_id = $quiz->id;
                $question->question = $data['question'][0];
                $questionsTable->save($question);
                break;
            case 11:
                $question = $this->patchQuestionsEntity($data ,$questionsTable);
                $question->quiz_id = $quiz->id;
                $question->question = $data['questions'];
                $questionsTable->save($question);
                break;
            
            default:
                if ($data['questionCount'] > 0){
                    foreach ($data['question'] as $key => $value) {
                        $question = $this->patchQuestionsEntity($data , $questionsTable);
                        if($data['type'] == 4 ){
                            $question->question = $value;
                            $question->palette = $key;
                        }if($data['type'] == 8){
                            $question->question = $value;
                            $question->oorder = $key;
                        }elseif($data['type'] != 4){
                            $question->question = $key;
                            $question->is_correct = $value == 'true' ? 1 : 0;
                        }
                        $question->quiz_id = $quiz->id;
                        $questionsTable->save($question);
                    }    
                }
                break;
        }

    }



    public function setOPtionsDataType($data , $option , $key , $value ){
        switch ($data['type']) {
            case 1:
                $option->qoption = $key;
                $option->is_correct = $value == 'true' ? 1 : 0;
                return $option ;
            
            case 2:
                $option->qoption = $value;
                $option->oorder = $key;
                return $option ;
            
            case 3:
                $option->qoption = $value;
                $option->oorder = $key;
                return $option ;
            
            case 4:
                $option->qoption = $value;
                $option->palette = $key;
                return $option ;
            
            case 5:
                $option->qoption = $value;
                $option->oorder = $key;
                return $option ;
            
            case 6:
                $option->qoption = $key;
                $option->oorder = $value;
                return $option ;
            
            case 7:
                $option->qoption = $key;
                $option->is_correct = $value == 'true' ? 1 : 0;
                return $option ;
            
            case 8:
                $option->qoption = $value;
                $option->oorder = $key;
                return $option ;

            case 9:
                $option->qoption = $value;
                $option->oorder = $key;
                return $option ;

            case 10:
                $option->qoption = $value;
                $option->oorder = $key;
                return $option ;
            
            case 11:
                $option->qoption = $value;
                $option->oorder = $key;
                return $option ; 
            
            default:
                # Default code...
                break;
        }
    }
    
    public function uploadQuizFiles($data){
        switch ($data['type']) {
            case 2:
                for ($i=1 ; $i < 5 ; $i++) { 
                        $name = $data['option'.$i]->getClientFilename();
                        $targetPath = WWW_ROOT. DS .'img' .DS .'uploads'. DS .'picture'. DS . $name;
                            if ($data['option'.$i]->getSize() > 0 && $data['option'.$i]->getError() == 0) {
                                $data['option'.$i]->moveTo($targetPath);
                                $data['option'.$i] = $name;
                            }
                }
                return $data;
            case 11:
                $name = $data['questions']->getClientFilename();
                $targetPath = WWW_ROOT. DS .'img' .DS .'uploads'. DS .'audio'. DS . $name;
                        if ($data['questions']->getSize() > 0 && $data['questions']->getError() == 0) {
                                $data['questions']->moveTo($targetPath);
                                $data['questions'] = $name;
                        }
                return $data;
            default:
                return $data;
        }
    }
    public function createQuiz($data){
            $result = false;
            $message = '';
            $questionsTable = TableRegistry::getTableLocator()->get('Questions');
            $optionsTable  = TableRegistry::getTableLocator()->get('Options');
            $quizsTable  = TableRegistry::getTableLocator()->get('Quizs');
        
            $result = $this->saveQuiz($data  ,$quizsTable);
            
            $data = $this->uploadQuizFiles($data);
            switch ($data['type']) {
                case 2:
                    for ($i=1; $i < 5 ; $i++) { 
                        $option = $this->patchOptionsEntity($data , $optionsTable);
                        $option->is_correct = $data['correctImg'] == $i ?  1 : 0 ; 
                        $option->quiz_id = $result->id;
                        $option->qoption = $data['option'.$i];
                        $optionsTable->save($option);
                    }
                    break;
                default:
                    if($data['optionCount'] > 0){
                        $data['options'] = !is_array($data['options']) ?  explode(',', $data['options']) : $data['options'];
                        foreach ($data['options'] as $key => $value) {
                            $option =  $this->patchOptionsEntity($data , $optionsTable);
                            $option->quiz_id = $result->id;
                            $option =  $this->setOPtionsDataType($data , $option , $key , $value );
                            $optionsTable->save($option);
                        }
                    }
                    break;
            }
            $this->saveQuestionsData($data,$questionsTable,$result);    
        
            $responseData = [
                'result' => '',
                'source' => '',
                'quiz' => $data['title'],
                'msg' => $message,
                'id' => $result['id']
            ];
            return $responseData;
        }


}
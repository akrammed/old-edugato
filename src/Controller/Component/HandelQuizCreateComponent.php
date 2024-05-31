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

    public function createQuiz($data){
            $result = false;
            $message = '';
            $questionsTable = TableRegistry::getTableLocator()->get('Questions');
            $optionsTable  = TableRegistry::getTableLocator()->get('Options');
            $quizsTable  = TableRegistry::getTableLocator()->get('Quizs');
        
            $quiz = $quizsTable->newEmptyEntity();
            $quizData = [
                'title'=>$data['title'],
                'description'=>$data['description'],
                'quiztype_id'=>$data['type'],
            ];
            $quiz = $quizsTable->patchEntity($quiz,$quizData);
            $result = $quizsTable->save($quiz);
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
                        
                  
                    break;
                case 11:
                        $name = $data['questions']->getClientFilename();
                            $targetPath = WWW_ROOT. DS .'img' .DS .'uploads'. DS .'audio'. DS . $name;
                                if ($data['questions']->getSize() > 0 && $data['questions']->getError() == 0) {
                                    $data['questions']->moveTo($targetPath);
                                    $data['questions'] = $name;
                                }
                    break;
                case 9 :
                    for ($i=1 ; $i < 5 ; $i++) { 
                        $data = $this->app->upload($data,'option'.$i,'video');
                    }
                    break;
                default:
                    # code...
                    break;
            }
        
            if ($data['optionCount'] > 0  && $data['type'] != 2) {
                if (!is_array($data['options'])) {
                    $data['options'] = explode(',', $data['options']);
                }
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
                        if($data['type'] == 11 ){
                            $option->qoption = $value;
                            $option->oorder = $key;
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
                if ($data['questionCount'] > 0  && $data['type'] != 2 && $data['type'] != 6 && $data['type'] != 11) {
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
                
        
            $responseData = [
                'result' => '',
                'source' => '',
                'quiz' => $data['title'],
                'msg' => $message,
                'id' => $quiz['id']
            ];
            return $responseData;
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
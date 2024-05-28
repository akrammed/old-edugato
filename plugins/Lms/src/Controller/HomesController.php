<?php
declare(strict_types=1);

namespace Lms\Controller;

use Cake\ORM\TableRegistry;
use Lms\Controller\AppController;


/**
 * Homes Controller
 *
 */
/**
 * @var array $currentSessionUser
 */
class HomesController extends AppController
{
public function home(){
    $this->viewBuilder()->setLayout('temp-default');
}
public function about(){
   $this->viewBuilder()->setLayout('temp-default');
}
public function comming(){
   $this->viewBuilder()->setLayout('temp-default');
}
public function contact(){
   $this->viewBuilder()->setLayout('temp-default');
}
public function courses(){
   $this->viewBuilder()->setLayout('temp-default');
}
public function dashboard(){
   $this->viewBuilder()->setLayout('temp-panel');
}
public function profile(){
    $idUser = $this->Authentication->getIdentity()->getOriginalData()->id;
    $this->viewBuilder()->setLayout('temp-default');
    $scoresTable = TableRegistry::getTableLocator()->get('Quiz.Scores');

    $totalPoints = $scoresTable->find()->where(['user_id' => $idUser])->func()->sum('point');
    $totalPoints = $scoresTable->find()->select(['total' => $totalPoints])->first()->total;
    // dd($totalPoints);
    $this->set(compact(['totalPoints']));
}

public function payment($id = null){
   $this->viewBuilder()->setLayout('temp-default');
   $coursesTable = TableRegistry::getTableLocator()->get('Lms.Courses');
   $course = $coursesTable->get($id, contain: ['Lessons', 'Ratings', 'Levels', 'Users']);
   $this->set(compact(['course']));
}

}
<?php
declare(strict_types=1);


namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Http\Response;
use Lms\Controller\AppController;

/**
 * Dashboard Controller
 *
 * @property \Lms\Model\Table\CoursesTable $Courses
 * @property \App\Model\Table\UsersTable $Users
 */
class DashboardController extends AppController
{

    public function index()
    {
        //
    }

    public function getDetails()
    {
        $numberUsers = $this->getNumberUsers();
        $numberCourses = $this->getNumberCourses();
        $responseData = [
            'users' => $numberUsers,
            'courses' => $numberCourses,
        ];

        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }

    public function chartUsers(){
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $query = $usersTable->find();
        $usersByMonth = $query
            ->select([
                'month' => $query->func()->date_format([
                    'created_at' => 'identifier',
                    "'%Y-%m'" => 'literal'
                ]),
                'count' => $query->func()->count('*')
            ])
            ->group('month')
            ->toArray();
            $responseData = [
               'data'=>$usersByMonth
            ];

            $response = new Response();
            $response = $response->withType('application/json')
                ->withStringBody(json_encode($responseData));
            return $response;

    }


    public function getActiveUsers(){
        $userLogsTable = TableRegistry::getTableLocator()->get('UserLogs');
        $query = $userLogsTable->find();


        $firstDayOfLastMonth = date('Y-m-d', strtotime('first day of this month'));
        $lastDayOfLastMonth = date('Y-m-d', strtotime('last day of this month'));

        $usersByDay = $query
            ->select([
                'day' => $query->func()->date_format([
                    'date' => 'identifier',
                    "'%Y-%m-%d'" => 'literal'
                ]),
                'count' => $query->func()->count('*')
            ])
            ->where(['date >=' => $firstDayOfLastMonth, 'date <=' => $lastDayOfLastMonth])
            ->group('day')
            ->toArray();

        $responseData = [
            'data'=>$usersByDay
        ];

        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }


    public function getNumberUsers()
    {
        $users = TableRegistry::getTableLocator()->get('Users');
        return $users->find()->count();
    }

    public function getNumberCourses()
    {
        $courses = TableRegistry::getTableLocator()->get('Lms.Courses');
        return $courses->find()->count();
    }

    public function getBenifitsThisMonth(){
        $userTable = TableRegistry::getTableLocator()->get('Users');
        $query = $userTable->find();

        $firstDayOfLastMonth = date('Y-m-d', strtotime('first day of this month'));
        $lastDayOfLastMonth = date('Y-m-d', strtotime('last day of this month'));
        $numberCourse = $query
            ->select([
                'count' => $query->func()->count('*')
            ])
            ->where(['buy_at >=' => $firstDayOfLastMonth, 'buy_at <=' => $lastDayOfLastMonth])
            ->where(['course_id is not' => null])->first();


            $responseData = [
                'data'=>$numberCourse->count*3300
            ];

            $response = new Response();
            $response = $response->withType('application/json')
                ->withStringBody(json_encode($responseData));
            return $response;
    }
    public function getBenifitsThisYear(){
        $userTable = TableRegistry::getTableLocator()->get('Users');
        $query = $userTable->find();

        $firstDayOfLastMonth = date('Y-m-d', strtotime('first day of this year'));
        $lastDayOfLastMonth = date('Y-m-d', strtotime('last day of this year'));
        $numberCourse = $query
            ->select([
                'count' => $query->func()->count('*')
            ])
            ->where(['buy_at >=' => $firstDayOfLastMonth, 'buy_at <=' => $lastDayOfLastMonth])
            ->where(['course_id is not' => null])->first();


            $responseData = [
                'data'=>$numberCourse->count*3300
            ];

            $response = new Response();
            $response = $response->withType('application/json')
                ->withStringBody(json_encode($responseData));
            return $response;
    }

}

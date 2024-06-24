<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;


use Cake\Controller\Controller;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {

        parent::initialize();

        $this->loadComponent('Flash', [
            'element' => [
                'success' => 'flash/success',
                'error' => 'flash/error',
                'warning' => 'flash/warning',
                'default' => 'flash/default'
            ]
        ]);
        $this->loadComponent('Authentication.Authentication');
        $this->request->getSession()->write('Config.language', 'ar');
        $this->fetchGlobalTableLocator();
        $this->fetchGlobalObject();

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check
        $this->Authentication->addUnauthenticatedActions(['login', 'view']);
        $controller = $this->getRequest()->getParam('controller');
        $plugin = $this->getRequest()->getParam('plugin');


        if (($controller === 'Pages')) {
            $this->Authentication->allowUnauthenticated(['display', 'about', 'contact']);
        }
        if (($controller === 'Shorts')) {
            $this->Authentication->allowUnauthenticated(['getShortAjax', 'watch']);
        }
        if (($controller === 'Users')) {
            $this->Authentication->allowUnauthenticated(['login', 'create', 'createAjax', 'validateAjax', 'registerNewUserAjax', 'loginUserAjax']);
        }
        if (($controller === 'Homes') && ($plugin === 'Lms')) {
            $this->Authentication->allowUnauthenticated(['home', 'about', 'contact', 'courses', 'payment', 'comming']);
        } elseif ($controller === 'Assistant') {
            $this->Authentication->addUnauthenticatedActions(['getAssistant']);
        }
    }

    public function fetchGlobalTableLocator()
    {
        $rolsTable = TableRegistry::getTableLocator()->get('Roles');
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $userLogsTable = TableRegistry::getTableLocator()->get('UserLogs');
        $locationsTable = TableRegistry::getTableLocator()->get('Locations');
        $coursesTable = TableRegistry::getTableLocator()->get('Lms.Courses');
        $lessonsTable = TableRegistry::getTableLocator()->get('Lms.Lessons');
        $chaptersTable = TableRegistry::getTableLocator()->get('Lms.Chapters');
        $categorysTable = TableRegistry::getTableLocator()->get('Lms.Categorys');
        $levelsTable = TableRegistry::getTableLocator()->get('Lms.Levels');
        $questionsTable = TableRegistry::getTableLocator()->get('Questions');
        $optionsTable  = TableRegistry::getTableLocator()->get('Options');
        $scoresTable = TableRegistry::getTableLocator()->get('Quiz.Scores');
        $this->set(compact([
            'levelsTable',
            'categorysTable',
            'chaptersTable',
            'lessonsTable',
            'coursesTable',
            'locationsTable',
            'usersTable',
            'rolsTable',
            'questionsTable',
            'optionsTable',
            'scoresTable',
            'userLogsTable'

        ]));
    }


    public function fetchGlobalObject()
    {

        if ($this->Authentication->getIdentity() != null) {
            $currentSessionUser  = $this->Authentication->getIdentity()->getOriginalData();
            $isAdmin = $this->Authentication->getIdentity()->getOriginalData()->role_id == 2 ? true : false;
            $isStudent =  $this->Authentication->getIdentity()->getOriginalData()->role_id == 1 ? true : false;
            $isInstructor = $this->Authentication->getIdentity()->getOriginalData()->role_id == 3 ? true : false;
        } else {
            $currentSessionUser = [];
            $isAdmin = null;
            $isStudent =  null;
            $isInstructor = null;
        }
        $currentDateTime = Time::now();
        $currentDate = Time::now()->format('Y-m-d');
        $currency = ['DZ'];
        $coursesTable = TableRegistry::getTableLocator()->get('Lms.Courses');
        $courses = $coursesTable->find()->toArray();
        $shortsTable = TableRegistry::getTableLocator()->get('Shorts');
        $shorts = $shortsTable->find()->toArray();
        $quizsTable = TableRegistry::getTableLocator()->get('Quizs');
        $quizs = $quizsTable->find('list', [
            'keyField' => 'id',
            'valueField' => 'title'
        ])->toArray();
        $pluginName = $this->plugin;
        $shortGroupes = [];
        $this->set(compact([
            'currentSessionUser',
            'isAdmin',
            'isStudent',
            'isInstructor',
            'currentDateTime',
            'currentDate',
            'currency',
            'courses',
            'pluginName',
            'shorts',
            'quizs',
            'shortGroupes'
        ]));
    }


    public function upload($data, $field, $type)
    {

        if ($this->request->is(['patch', 'post', 'put'])) {
            $postVid = $this->request->getData($field);
            $name = $postVid->getClientFilename();
            $targetPath = WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $type . DS . $name;
            if ($postVid->getSize() > 0 && $postVid->getError() == 0) {
                $postVid->moveTo($targetPath);
                $data[$field] = $name;
            }
        }
        return $data;
    }
}

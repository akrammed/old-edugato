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

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        $this->viewBuilder()->setLayout('landing-layout');
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function dashboard()
    {
        $currentSessionUser = $this->Authentication->getIdentity()->getOriginalData();
        $isAdmin = ($currentSessionUser ? $currentSessionUser->role_id : null) === 2;
        $this->viewBuilder()->setLayout($isAdmin ? 'new-admin-layout' : 'dashboard-layout');
        $this->set('layer', $isAdmin ? 'admin' : 'dashboard');
        $this->set('sidebar', $isAdmin ? 'dashboard/admin-aside' : 'dashboard/aside');
        $courseUserTable = TableRegistry::getTableLocator()->get('CoursesUsers');
        $CandostatmentsTable = TableRegistry::getTableLocator()->get('Candostatments');
        $learningpathsTable = TableRegistry::getTableLocator()->get('Learningpaths');
        $userId = $currentSessionUser ? $currentSessionUser->id : null;
        $where = ['user_id' => $userId];
        $learningPaths = $courseUserTable->find()->where($where)->first();
        $currentLearningPath = !empty($learningPaths) ? $learningpathsTable->get($learningPaths->learningpath_id) : $learningpathsTable->find()->where(['is_free IS' => 1])->first();
        $candostatments = !empty($currentLearningPath) ? $CandostatmentsTable->find()->contain(['Shorts'])->where(['learningpath_id IS' => $currentLearningPath->id])->toArray() : [];
        $activeCandostatments = !empty($currentLearningPath) ? $CandostatmentsTable->find()->contain(['Shorts'])->where(['learningpath_id IS' => $currentLearningPath->id, 'is_active IS' => 1])->first() : [];

        $this->set(compact(['candostatments', 'currentSessionUser', 'currentLearningPath', 'activeCandostatments']));
    }
    public function play()
    {
        $this->viewBuilder()->setLayout('dashboard-layout');
        $this->set('layer', 'admin');
        $this->set('sidebar', 'dashboard/aside');
        $this->set('altBackground', true);
    }
    public function comingsoon()
    {
        $currentSessionUser = $this->Authentication->getIdentity()->getOriginalData();
        $isAdmin = ($currentSessionUser ? $currentSessionUser->role_id : null) === 2;
        $this->viewBuilder()->setLayout($isAdmin ? 'new-admin-layout' : 'dashboard-layout');
        $this->set('layer', $isAdmin ? 'admin' : 'dashboard');
        $this->set('sidebar', $isAdmin ? 'dashboard/admin-aside' : 'dashboard/aside');
    }
}

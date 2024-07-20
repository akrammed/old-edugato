<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CoursesUsers Controller
 *
 * @property \App\Model\Table\CoursesUsersTable $CoursesUsers
 */
class CoursesUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->CoursesUsers->find()
            ->contain(['Courses', 'Learningpaths']);
        $coursesUsers = $this->paginate($query);

        $this->set(compact('coursesUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Courses User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coursesUser = $this->CoursesUsers->get($id, contain: ['Courses', 'Learningpaths', 'Users']);
        $this->set(compact('coursesUser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coursesUser = $this->CoursesUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $coursesUser = $this->CoursesUsers->patchEntity($coursesUser, $this->request->getData());
            if ($this->CoursesUsers->save($coursesUser)) {
                $this->Flash->success(__('The courses user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The courses user could not be saved. Please, try again.'));
        }
        $courses = $this->CoursesUsers->Courses->find('list', limit: 200)->all();
        $learningpaths = $this->CoursesUsers->Learningpaths->find('list', limit: 200)->all();
        $this->set(compact('coursesUser', 'courses', 'learningpaths'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Courses User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coursesUser = $this->CoursesUsers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coursesUser = $this->CoursesUsers->patchEntity($coursesUser, $this->request->getData());
            if ($this->CoursesUsers->save($coursesUser)) {
                $this->Flash->success(__('The courses user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The courses user could not be saved. Please, try again.'));
        }
        $courses = $this->CoursesUsers->Courses->find('list', limit: 200)->all();
        $learningpaths = $this->CoursesUsers->Learningpaths->find('list', limit: 200)->all();
        $this->set(compact('coursesUser', 'courses', 'learningpaths'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Courses User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coursesUser = $this->CoursesUsers->get($id);
        if ($this->CoursesUsers->delete($coursesUser)) {
            $this->Flash->success(__('The courses user has been deleted.'));
        } else {
            $this->Flash->error(__('The courses user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

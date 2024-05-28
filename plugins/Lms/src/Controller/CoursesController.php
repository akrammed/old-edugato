<?php
declare(strict_types=1);

namespace Lms\Controller;

use Cake\ORM\TableRegistry;
use Cake\Http\Response;
use Lms\Controller\AppController;

/**
 * Courses Controller
 *
 * @property \Lms\Model\Table\CoursesTable $Courses
 */
class CoursesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('temp-panel');
        $query = $this->Courses->find()
            ->contain(['Lessons', 'Ratings', 'Levels']);
        $courses = $this->paginate($query);

        $this->set(compact('courses'));
    }

    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('temp-default');
        $course = $this->Courses->get($id, contain: ['Lessons', 'Ratings', 'Levels', 'Users']);
        $chaptersTable = TableRegistry::getTableLocator()->get('Lms.Chapters');
        $chapters = $chaptersTable->find()->toArray();
        $this->set(compact(['course','chapters']));
    }
    public function watch($id)
    {
        $this->viewBuilder()->setLayout('temp-vedio');
        $course =  $this->Courses->find('all',[
            'conditions' => ['id' => $id]
        ])->first();

        $lessons = $this->Courses->Lessons->find('all', [
            'conditions' => ['course_id' => $id],
            'contain' => ['Chapters']
        ]);
        $this->set(compact('lessons','course'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $course = $this->Courses->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
     
            if ($data['background_picture']->getError() === UPLOAD_ERR_NO_FILE) {
                unset($data['background_picture']);
            }else{
                     $data = $this->upload($data,'background_picture','picture');
            }
       
            $data = $this->upload($data,'picture','picture');
            $course = $this->Courses->patchEntity($course, $data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        $lessons = $this->Courses->Lessons->find('list', [
            'keyField' => 'id',
            'valueField' => 'lesson',
            'limit' => 200
        ])->toArray();
        $ratings = $this->Courses->Ratings->find('list', [
            'keyField' => 'id',
            'valueField' => 'rating',
            'limit' => 200
        ])->toArray();
        $levels = $this->Courses->Levels->find('list', [
            'keyField' => 'id',
            'valueField' => 'level',
            'limit' => 200
        ])->toArray();
        $categories = $this->Courses->Categorys->find('list', [
            'keyField' => 'id',
            'valueField' => 'category',
            'limit' => 200
        ])->toArray();
        $this->set(compact('course', 'lessons', 'ratings', 'levels','categories'));
    }

    public function levels(){
        $levels = $this->Courses->Levels->find();
        $responseData = [
            'levels' => $levels,
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }
    public function categories(){
        $categories = $this->Courses->Categorys->find();
        $responseData = [
            'categories' => $categories,
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }

    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($id == null){
            $data = $this->request->getData();
            $id = $data['course_id'];
        }
        $course = $this->Courses->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if ($data['picture']->getError() === UPLOAD_ERR_NO_FILE) {
                unset($data['picture']);
            }
            if ($data['background_picture']->getError() === UPLOAD_ERR_NO_FILE) {
                unset($data['background_picture']);
            }

            $course = $this->Courses->patchEntity($course, $data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course could not be saved. Please, try again.'));
        }
        // $lessons = $this->Courses->Lessons->find('list', [
        //     'keyField' => 'id',
        //     'valueField' => 'lesson',
        //     'limit' => 200
        // ])->toArray();
        // $ratings = $this->Courses->Ratings->find('list', [
        //     'keyField' => 'id',
        //     'valueField' => 'rating',
        //     'limit' => 200
        // ])->toArray();
        // $levels = $this->Courses->Levels->find('list', [
        //     'keyField' => 'id',
        //     'valueField' => 'level',
        //     'limit' => 200
        // ])->toArray();
        // $categories = $this->Courses->Categorys->find('list', [
        //     'keyField' => 'id',
        //     'valueField' => 'category',
        //     'limit' => 200
        // ])->toArray();
        // $this->set(compact('course', 'lessons', 'ratings', 'levels','categories'));
        $responseData = [
            'course' => $course,
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('The course has been deleted.'));
        } else {
            $this->Flash->error(__('The course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function manage($id = null){
        $this->viewBuilder()->setLayout('temp-panel');
        $course =  $this->Courses->find('all',[
            'conditions' => ['id' => $id]
        ])->first();

        $lessons = $this->Courses->Lessons->find('all', [
            'conditions' => ['course_id' => $id],
            'contain' => ['Chapters']
        ]);
        $this->set(compact('lessons','course'));
    }

    public function getAllCoursesApi(){
        $courses = $this->Courses->find()->contain(['Lessons' => ['Chapters'], 'Ratings', 'Levels', 'Users']);

        $chaptersTable = TableRegistry::getTableLocator()->get('Lms.Chapters');
        $chapters = $chaptersTable->find()->toArray();
        $responseData = [
            'courses' => $courses,
            'chapters' => $chapters,
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
        }


}

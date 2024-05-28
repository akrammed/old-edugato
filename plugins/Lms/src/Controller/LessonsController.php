<?php
declare(strict_types=1);

namespace Lms\Controller;

use Lms\Controller\AppController;
use Cake\Http\Response;

/**
 * Lessons Controller
 *
 * @property \Lms\Model\Table\LessonsTable $Lessons
 */
class LessonsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('temp-panel');
        $query = $this->Lessons->find();

        $lessons = $this->paginate($query);

        $this->set(compact('lessons'));
    }

    /**
     * View method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lesson = $this->Lessons->get($id, contain: ['Chapters', 'Courses']);
        $this->set(compact('lesson'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lesson = $this->Lessons->newEmptyEntity();
        if ($this->request->is('post')) {
            $lesson = $this->Lessons->patchEntity($lesson, $this->request->getData());
            if ($this->Lessons->save($lesson)) {
                // $chapters = $this->request->getData('json_data');
                // // dd($chapters);
                // $jsonData = json_decode($chapters, true);
                // // dd($jsonData);
                // $uniqueData = $this->unique_array($jsonData);
                // $lessonId = $lesson->id;
                // // dd($uniqueData);
                // foreach ($uniqueData as $chap) {
                //     $chapter = $this->Lessons->Chapters->newEmptyEntity();
                //     $chapter->chapter = $chap['chapter'];
                //     $chapter->vedio = $chap['video'];
                //     $chapter->quizz = $chap['quizz'];
                //     $chapter->quizz_title = $chap['quizz_title'];
                //     $chapter->description = $chap['chapterDescription'];
                //     $chapter->content = $chap['chapterContent'];
                //     $chapter->lesson_id =$lessonId;
                //     $this->Lessons->Chapters->save($chapter);
                // }
                $this->Flash->success(__('The lesson has been saved.'));

                return $this->redirect(['controller' => 'Courses','action' => 'manage',$lesson->course_id]);
            }
            $this->Flash->error(__('The lesson could not be saved. Please, try again.'));
        }
        $chapters = $this->Lessons->Chapters->find('list', limit: 200)->all();
        $courses = $this->Lessons->Courses->find('list', [
            'keyField' => 'id',
            'valueField' => 'title',
            'limit' => 200
        ])->toArray();
        $folderPath = WWW_ROOT. 'uploads' .DS .'video';
        $files = scandir($folderPath);
        $vd = array_values(array_diff($files, array('.', '..')));
        $vedios = array_combine($vd, $vd);

        $this->set(compact('lesson', 'chapters','courses','vedios'));
    }

    public function unique_array($array) {
        $serialized = array_map('serialize', $array);
        $unique = array_unique($serialized);
        return array_intersect_key($array, $unique);
    }
    /**
     * Edit method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id=null)
    {
        // $this->viewBuilder()->setLayout('temp-panel');
        if($id == null){
            $data = $this->request->getData();
            $id = $data['lesson_id'];
        }
        $lesson = $this->Lessons->get($id, contain: ['Chapters', 'Courses']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lesson = $this->Lessons->patchEntity($lesson, $this->request->getData());
            if ($this->Lessons->save($lesson)) {

                $this->Flash->success(__('The lesson has been saved.'));

                return $this->redirect(['controller' => 'Courses','action' => 'manage',$lesson->course_id]);
            }
            $this->Flash->error(__('The lesson could not be saved. Please, try again.'));
        }
        $responseData = [
            'lesson' => $lesson,
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }
        // $chapters = $this->Lessons->Chapters->find('all', [
        //     'conditions' => ['lesson_id' => $id],

        //     'limit' => 200
        // ])->toArray();
        // $courses = $this->Lessons->Courses->find('list', [
        //     'keyField' => 'id',
        //     'valueField' => 'title',
        //     'limit' => 200
        // ])->toArray();
        // // dd($chapters);
        // $folderPath = WWW_ROOT. 'uploads' .DS .'video';
        // $files = scandir($folderPath);
        // $vd = array_values(array_diff($files, array('.', '..')));
        // $vedios = array_combine($vd, $vd);

        // $this->set(compact('lesson', 'chapters','courses','vedios'));


    /**
     * Delete method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $lesson = $this->Lessons->get($id);
        $course_id = $lesson->course_id;
        if ($this->Lessons->delete($lesson)) {
            $this->Flash->success(__('The lesson has been deleted.'));
        } else {
            $this->Flash->error(__('The lesson could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Courses','action' => 'manage',$course_id]);
    }
}

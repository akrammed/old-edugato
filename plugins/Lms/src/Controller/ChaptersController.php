<?php
declare(strict_types=1);

namespace Lms\Controller;

use Lms\Controller\AppController;
use Cake\Http\Response;
/**
 * Chapters Controller
 *
 * @property \Lms\Model\Table\ChaptersTable $Chapters
 */
class ChaptersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    { $this->viewBuilder()->setLayout('temp-panel');
        $query = $this->Chapters->find()
        ->contain(['Lessons']);;
        $chapters = $this->paginate($query);
        $this->set(compact('chapters'));
    }

    /**
     * View method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('temp-panel');
        $chapter = $this->Chapters->get($id, contain: ['Lessons']);
        $this->set(compact('chapter'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $chapter = $this->Chapters->newEmptyEntity();
        if ($this->request->is('post')) {
            $chapter = $this->Chapters->patchEntity($chapter, $this->request->getData());
            // dd($chapter);
            $data = $this->request->getData();
            if ($this->Chapters->save($chapter)) {
                $this->Flash->success(__('The chapter has been saved.'));

                return $this->redirect(['controller' => 'Courses','action' => 'manage',$data['course_id']]);
            }
            $this->Flash->error(__('The chapter could not be saved. Please, try again.'));
        }




    }

    public function getAllVideos(){

        $dir =WWW_ROOT. DS .'img' .DS .'uploads'. DS ."video";
        if(!file_exists($dir)){
            throw new NotFoundException(__('Directory not found'));
        }else{
            $items = array_diff(scandir($dir), array('.', '..'));
            $files = array_filter($items, function($item) use ($dir) {
                return is_file($dir . '/' . $item);
            });
            $responseData = [
                'videos' => $files,
            ];
            $response = new Response();
            $response = $response->withType('application/json')
                ->withStringBody(json_encode($responseData));
            return $response;

        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
      public function edit()
    {
        $data = $this->request->getData();
        // dd($data);
        if(@$data['chapter_id']){
            $id = $data['chapter_id'];
            $chapter = $this->Chapters->get($id, contain: []);
        }else{
            $chapter = $this->Chapters->newEmptyEntity();
        }


        if ($this->request->is(['patch', 'post', 'put'])) {
            // $data = $this->upload($data,'vedio','video');
                $chapter = $this->Chapters->patchEntity($chapter, $data);
                if ($this->Chapters->save($chapter)) {
                    $this->Flash->success(__('The chapter has been saved.'));

                    return $this->redirect(['controller' => 'Courses','action' => 'manage',$data['course_id']]);
                }
                $this->Flash->error(__('The chapter could not be saved. Please, try again.'));
            }


        }
        // $folderPath = WWW_ROOT. 'uploads' .DS .'video';
        // $files = scandir($folderPath);
        // $vd = array_values(array_diff($files, array('.', '..')));
        // $vedios = array_combine($vd, $vd);
        // $lessons = $this->Chapters->Lessons->find('list', [
        //     'keyField' => 'id',
        //     'valueField' => 'lesson',
        //     'limit' => 200
        // ])->toArray();
        // $this->set(compact('chapter','lessons','vedios'));

     public function getVideoChapter(){
        $id = $this->request->getQuery('chapterId');
        $chapter = $this->Chapters->get($id, contain: []);

        $responseData = [
            'video' => $chapter->vedio
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
     }


    /**
     * Delete method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $id = $this->request->getData('chapter_id');
        $chapter = $this->Chapters->get($id);

        if ($this->Chapters->delete($chapter)) {
            $this->Flash->success(__('The chapter has been deleted.'));
        } else {
            $this->Flash->error(__('The chapter could not be deleted. Please, try again.'));
        }
        $responseData = [
            'message' => "The chapter is deleted secessfully",
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
        //return $this->redirect(['controller' => 'Courses','action' => 'manage',$data['course_id']]);
    }

    public function import(){
        $message = "Problem";
        $status = "bed";
        $data = $this->request->getData('data');
        $lessonId = $this->request->getData('lessonId');
        foreach ($data as $chapterId) {
            $chapterExist =  $this->Chapters->find('all',[
                'conditions' => ['id' => $chapterId]
            ])->first();
                    $chapter = $this->Chapters->newEmptyEntity();
                    $chapter->chapter = $chapterExist->chapter;
                    $chapter->vedio = $chapterExist->video;
                    $chapter->quizz = $chapterExist->quizz;
                    $chapter->quizz_title = $chapterExist->quizz_title;
                    $chapter->description = $chapterExist->chapterDescription;
                    $chapter->content = $chapterExist->chapterContent;
                    $chapter->lesson_id =$lessonId;
                    $this->Chapters->save($chapter);
        }
        $message ="the chapters imported secessfully";
        $status= "good";

    $responseData = [
        'message' => $message,
        'status' => $status,
    ];
    $response = new Response();
    $response = $response->withType('application/json')
        ->withStringBody(json_encode($responseData));
return $response;
    }

}

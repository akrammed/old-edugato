<?php

declare(strict_types=1);

namespace App\Controller;

use ArrayObject;
use Authentication\Identifier\AbstractIdentifier;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Lms\Controller\Component\HandelpurchasCourseComponent;

/**
 * Users Controller
 * @property HandelpurchasCourseComponent $handelpurchasCourse
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('admin-layout');
        $query = $this->Users->find()
            ->contain(['Roles', 'Locations', 'Courses']);
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: ['Roles', 'Locations', 'Courses']);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('add-layout');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->Users->Roles->find('list', limit: 200)->all();
        $locations = $this->Users->Locations->find('list', limit: 200)->all();
        $courses = $this->Users->Courses->find('list', limit: 200)->all();
        $this->set(compact('user', 'roles', 'locations', 'courses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('dashboard-layout');
        $this->set('layer', 'edit-profile');
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if (($data['profile_picture']->getClientFilename()) != '') {
                $data = $this->upload($data, 'profile_picture', 'picture');
                $profilePicture = $data['data']['profile_picture'];
            } else {
                $data['profile_picture'] = $user['profile_picture'];
                $profilePicture = $data['profile_picture'];
            }
            $this->Authentication->getIdentity()->getOriginalData()->profile_picture = $profilePicture;
            $user = $this->Users->patchEntity($user, $data['data']);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'edit', $id]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function create()
    {
        $this->viewBuilder()->setLayout('user-layout');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $user = $this->Users->patchEntity($user, $data);
            $result = $this->Users->save($user);
            if ($result) {

                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', limit: 200)->all();
        $locations = $this->Users->Locations->find('list', limit: 200)->all();
        $courses = $this->Users->Courses->find('list', limit: 200)->all();
        $this->set(compact('user', 'roles', 'locations', 'courses'));
    }


    public function login($id = null)
    {

        $this->viewBuilder()->setLayout('user-layout');
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            return $this->redirect('/admin');
        }
        if ($this->request->is('post')) {
            $this->Flash->error('Invalid username or password');
        }
    }


    public function logout()
    {

        $sessionLogin = $this->Authentication->getResult();
        $user = $sessionLogin->getData();
        $userEntity = $this->Users->get($user['id']);
        $userEntity->is_active = 0;
        $this->Users->save($userEntity);
        $this->Authentication->logout();
        return $this->redirect(['plugin' => null, 'controller' => 'Pages', 'action' => 'display']);
    }
    public function loginUserAjax()
    {

        $this->autoRender = false;
        $result = false;
        $errorString = '';
        $data = $this->request->getData();
        $identityData = new ArrayObject([
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        $sessionLogin = $this->Authentication->getResult();

        if ($sessionLogin != null) {
            $result = true;
        }

        $responseData = [
            'result' => $result,
            'msg' => $errorString,
            'isAdmin' => $this->Authentication->getIdentity()->getOriginalData()->role_id == 2 ? true : false,
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }



    public function registerNewUserAjax()
    {

        $this->autoRender = false;
        $result = false;
        $data = $this->request->getData();
        $user = $this->Users->newEmptyEntity();
        $user = $this->Users->patchEntity($user, $data);

        $user = $this->Users->save($user);
        $errorString = '';
        if ($user) {
            $result = true;
        }
        $this->Authentication->setIdentity($user);

        $responseData = [
            'result' => $result,
            'msg' => $errorString,
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }


    public function createAjax()
    {

        $this->autoRender = false;
        $result = false;
        $message = '';
        $data = $this->request->getQuery('data');
        if (count($data) == 2) {
            $user = $this->Users->get($this->Authentication->getIdentity()->getOriginalData()->id);
            $user = $this->Users->patchEntity($user, $data);
            $user->course_id = intval($data['course_id']);
            $savedUser = $this->Users->save($user);
            if ($savedUser) {
                $sessionLogin = $this->Authentication->setIdentity($savedUser);
                if ($sessionLogin != null) {
                    $result = true;
                }
            }
        } else {
            $user = $this->Users->newEmptyEntity();
            $user = $this->Users->patchEntity($user, $data);
            $user->course_id = intval($data['course_id']);
            $saveduser = $this->Users->save($user);
            $saveduser->role_id = 1;
            if ($saveduser) {
                $sessionLogin = $this->Authentication->setIdentity($saveduser);
                if ($sessionLogin != null) {
                    $result = true;
                }
            }
        }





        $responseData = [
            'result' => $result,
            'msg' => $message,
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }

    public function validateAjax()
    {
        $this->autoRender = false;
        $result = false;
        $message = '';
        $data = $this->request->getQuery('code');

        if ($this->isvalidsellcode($data)) {
            $result = true;
            $message = "Valid Code";
        } else {
            $message = "Invalid Code";
        }
        $responseData = [
            'result' => $result,
            'msg' => $message,
        ];
        $response = new Response();
        $response = $response->withType('application/json')
            ->withStringBody(json_encode($responseData));
        return $response;
    }


    public function isvalidsellcode($code)
    {

        $csvFile = WWW_ROOT . DS . 'files' . DS . 'demo.csv';


        // Initialisation de la variable pour le message de validation
        $isValid = null;



        // Lecture du fichier CSV
        $csvData = array_map('str_getcsv', file($csvFile));

        // Parcourir les lignes du fichier CSV
        foreach ($csvData as $key => $row) {
            // Vérifier si le code d'achat correspond et si sa valeur de validité est 0
            if ($row[2] == $code && $row[5] == 0) {
                // Modifier la valeur de validité à 1 dans les données en mémoire
                $csvData[$key][5] = 1;

                // Écrire les modifications dans le fichier CSV
                $file = fopen($csvFile, 'w');
                foreach ($csvData as $line) {
                    fputcsv($file, $line);
                }
                fclose($file);

                // Mettre à jour le message de validation
                $isValid = true;

                // Sortir de la boucle si le code est trouvé
                break;
            } elseif ($row[2] == $code && $row[5] == 1) {
                // Affichage du message si le code est expiré
                $isValid = false;
                // Sortir de la boucle si le code est trouvé
                break;
            }
        }

        // Affichage du message si le code n'existe pas
        if ($isValid == null) {
            $isValid = false;
        }
        return $isValid;
    }


    public function editProfile($id = null)
    {
        $this->autoRender = false;
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if (($data['profile_picture']->getClientFilename()) != '') {
                $data = $this->upload($data, 'profile_picture', 'picture');
            } else {
                $data['profile_picture'] = $user['profile_picture'];
            }
            $user = $this->Users->patchEntity($user, $data);
            $result = $this->Users->save($user);
            $this->Authentication->setIdentity($result);
            if ($result) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['plugin' => 'Lms', 'controller' => 'Homes', 'action' => 'profile', $id]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
    }
}

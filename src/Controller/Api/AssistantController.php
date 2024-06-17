<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Http\Exception\BadRequestException;
use Cake\Http\Client;

class AssistantController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->viewBuilder()->setClassName('Json');
    }
    

    public function getAssistant()
    {
        $prompt = $this->request->getData('prompt');
        $response = $this->RequestHandler->fetchAssistantResponse($prompt);
        $this->set(compact('response'));
        $this->viewBuilder()->setOption('serialize', 'response');
    }
  
}

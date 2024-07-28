<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\BadRequestException;
use Cake\Http\Response;
use Cake\Controller\Controller;
use Cake\Http\Client;
use Cake\Event\EventInterface;

class AisController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('OpenAI');
    }

    public function generate()
    {

        if ($this->request->is('post')) {
        $prompt = $this->request->getData('prompt');

        if (empty($prompt) || !is_string($prompt)) {
            throw new BadRequestException('Invalid prompt provided.');
        }

        $messages = [
            ['role' => 'system', 'content' => 'You are Gato, an English teacher at EduGato. Suggest 4 topics for a game composed of 10 questions in English. Wait for the user to choose a topic before continuing.'],
            ['role' => 'user', 'content' => $prompt]
        ];

        try {
            $response = $this->OpenAI->generateCompletion('gpt-3.5-turbo', $messages);
            dd($response);
        } catch (\Exception $e) {
            // Handle exception, such as logging the error or returning a specific response
            $this->response = $this->response->withStatus(500);
            $response = ['error' => $e->getMessage()];
        }

        $this->set(compact('response'));
        $this->viewBuilder()->setOption('serialize', 'response');
    } }
}
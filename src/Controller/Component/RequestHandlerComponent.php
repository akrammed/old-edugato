<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Http\Client;

class RequestHandlerComponent extends Component
{
    private $openaiApiKey = 'skdjfoij3m4i2j343kmlkdfkaj32k3j4';

    public function fetchAssistantResponse($prompt)
    {
        $http = new Client();
        $response = $http->post(
            'https://api.openai.com/v1/engines/gpt-3.5-turbo/completions',
            json_encode([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'EduGato is your English teacher assistant.'],
                    ['role' => 'user', 'content' => $prompt],
                    ['role' => 'assistant', 'content' => 'As your English teacher, let me explain that concept.'],
                    ['role' => 'assistant', 'content' => 'Here\'s an example to illustrate.'],
                    ['role' => 'assistant', 'content' => 'Would you like more examples or clarification on this topic?']
                ]
            ]),
            [
                'type' => 'json',
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->openaiApiKey,
                    'Content-Type' => 'application/json'
                ]
            ]
        );

        if ($response->isOk()) {
            $responseData = $response->getJson();
            return $responseData['choices'][0]['message']['content'] ?? 'No response';
        }

        return 'Error: ' . $response->getStatusCode();
    }

    public function checkQuizAnswer($question, $userAnswer)
    {
        return [
            'is_correct' => false,
            'correction' => 'The correct answer is Paris.'
        ];
    }
}

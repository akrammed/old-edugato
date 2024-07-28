<?php

declare(strict_types=1);


namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use OpenAI;

class OpenAIComponent extends Component
{
    private $client;

    public function initialize(array $config): void
    {
        parent::initialize($config);
        $apiKey = Configure::read('OpenAI.api_key');
        $this->client = OpenAI::client($apiKey);
    }

    public function generateCompletion($model, $messages)
    {
        // Validate messages
        foreach ($messages as $message) {
            if (empty($message['content']) || !is_string($message['content'])) {
                throw new \InvalidArgumentException('Invalid value for "content": expected a non-empty string.');
            }
        }

        return $this->client->chat()->create([
            'model' => $model,
            'messages' => $messages,
        ]);
    }
}
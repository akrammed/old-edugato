<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Http\Exception\BadRequestException;

class QuizController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->RequestHandler->renderAs($this, 'json');
        $this->response = $this->response->withType('application/json');
    }
    public function checkAnswer()
    {
        $this->request->allowMethod(['post']);
        $data = $this->request->getData();

        if (empty($data['question']) || empty($data['user_answer'])) {
            throw new BadRequestException('Invalid data');
        }

        $question = $data['question'];
        $userAnswer = $data['user_answer'];

        // Logic to check the answer (replace with your own logic)
        $correctAnswer = 'Paris'; // Example correct answer
        $isCorrect = strtolower($userAnswer) === strtolower($correctAnswer);

        $response = [
            'is_correct' => $isCorrect,
            'correction' => $isCorrect ? 'Correct!' : 'The correct answer is Paris.'
        ];

        $this->set([
            'response' => $response,
            '_serialize' => 'response'
        ]);
    }
}

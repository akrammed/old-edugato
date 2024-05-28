<?php
declare(strict_types=1);

namespace Quiz\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuizsFixture
 */
class QuizsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'question' => 'Lorem ipsum dolor sit amet',
                'question_2' => 'Lorem ipsum dolor sit amet',
                'question_3' => 'Lorem ipsum dolor sit amet',
                'question_4' => 'Lorem ipsum dolor sit amet',
                'question_5' => 'Lorem ipsum dolor sit amet',
                'question_6' => 'Lorem ipsum dolor sit amet',
                'question_7' => 'Lorem ipsum dolor sit amet',
                'is_q_true' => 1,
                'is_q2_true' => 1,
                'is_q3_true' => 1,
                'is_q4_true' => 1,
                'is_q7_true' => 1,
                'is_q5_true' => 1,
                'is_q6_true' => 1,
                'option_1' => 'Lorem ipsum dolor sit amet',
                'option_2' => 'Lorem ipsum dolor sit amet',
                'option_3' => 'Lorem ipsum dolor sit amet',
                'option_4' => 'Lorem ipsum dolor sit amet',
                'option_5' => 'Lorem ipsum dolor sit amet',
                'option_6' => 'Lorem ipsum dolor sit amet',
                'option_7' => 'Lorem ipsum dolor sit amet',
                'option_8' => 'Lorem ipsum dolor sit amet',
                'correct' => 'Lorem ipsum dolor sit amet',
                'quiztype_id' => 1,
            ],
        ];
        parent::init();
    }
}

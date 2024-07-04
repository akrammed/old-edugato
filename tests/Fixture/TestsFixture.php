<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TestsFixture
 */
class TestsFixture extends TestFixture
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
                'option_1' => 'Lorem ipsum dolor sit amet',
                'option_2' => 'Lorem ipsum dolor sit amet',
                'option_3' => 'Lorem ipsum dolor sit amet',
                'option_4' => 'Lorem ipsum dolor sit amet',
                'option_5' => 'Lorem ipsum dolor sit amet',
                'option_6' => 'Lorem ipsum dolor sit amet',
                'option_7' => 'Lorem ipsum dolor sit amet',
                'option_8' => 'Lorem ipsum dolor sit amet',
                'correct' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

<?php
declare(strict_types=1);

namespace Quiz\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QquestionsFixture
 */
class QquestionsFixture extends TestFixture
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
                'question' => 'Lorem ipsum dolor sit amet',
                'is_correct' => 1,
                'quiz_id' => 1,
            ],
        ];
        parent::init();
    }
}

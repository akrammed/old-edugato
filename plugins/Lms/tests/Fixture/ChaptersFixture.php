<?php
declare(strict_types=1);

namespace Lms\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ChaptersFixture
 */
class ChaptersFixture extends TestFixture
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
                'chapter' => 'Lorem ipsum dolor sit amet',
                'vedio' => 'Lorem ipsum dolor sit amet',
                'quizz' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet',
                'lesson_id' => 1,
                'created' => '2024-01-23',
                'modified' => '2024-01-23',
            ],
        ];
        parent::init();
    }
}

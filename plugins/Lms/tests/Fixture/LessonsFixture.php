<?php
declare(strict_types=1);

namespace Lms\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LessonsFixture
 */
class LessonsFixture extends TestFixture
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
                'lesson' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'course_id' => 1,
                'created' => '2024-01-23',
                'modified' => '2024-01-23',
            ],
        ];
        parent::init();
    }
}

<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CoursesFixture
 */
class CoursesFixture extends TestFixture
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
                'background_picture' => 'Lorem ipsum dolor sit amet',
                'picture' => 'Lorem ipsum dolor sit amet',
                'vedio_description' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'content' => 'Lorem ipsum dolor sit amet',
                'study_time' => 'Lorem ipsum dolor sit amet',
                'video_time' => 'Lorem ipsum dolor sit amet',
                'exams_number' => 'Lorem ipsum dolor sit amet',
                'is_active' => 1,
                'is_paid' => 1,
                'rating_id' => 1,
                'category_id' => 1,
                'level_id' => 1,
            ],
        ];
        parent::init();
    }
}

<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LearningpathsFixture
 */
class LearningpathsFixture extends TestFixture
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
                'path' => 'Lorem ipsum dolor sit amet',
                'picture' => 'Lorem ipsum dolor sit amet',
                'is_free' => 1,
            ],
        ];
        parent::init();
    }
}

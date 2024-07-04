<?php
declare(strict_types=1);

namespace Lms\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategorysFixture
 */
class CategorysFixture extends TestFixture
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
                'category' => 'Lorem ipsum dolor sit amet',
                'picture' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-01-23',
                'modified' => '2024-01-23',
            ],
        ];
        parent::init();
    }
}

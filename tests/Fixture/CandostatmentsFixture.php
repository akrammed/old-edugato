<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CandostatmentsFixture
 */
class CandostatmentsFixture extends TestFixture
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
                'learningpath_id' => 1,
                'is_active' => 1,
                'is_done' => 1,
            ],
        ];
        parent::init();
    }
}

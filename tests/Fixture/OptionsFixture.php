<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OptionsFixture
 */
class OptionsFixture extends TestFixture
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
                'qoption' => 'Lorem ipsum dolor sit amet',
                'is_correct' => 1,
                'oorder' => 'Lorem ipsum dolor sit amet',
                'palette' => 'Lorem ipsum dolor sit amet',
                'imageName' => 'Lorem ipsum dolor sit amet',
                'quiz_id' => 1,
            ],
        ];
        parent::init();
    }
}

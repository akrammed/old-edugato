<?php
declare(strict_types=1);

namespace Quiz\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuiztypesFixture
 */
class QuiztypesFixture extends TestFixture
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
                'type' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

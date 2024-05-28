<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'gender' => 'Lorem ipsum dolor sit amet',
                'phone_number' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'birth_date' => '2024-01-23',
                'profile_picture' => 'Lorem ipsum dolor sit amet',
                'marital_status' => 'Lorem ipsum dolor sit amet',
                'is_active' => 1,
                'bio' => 'Lorem ipsum dolor sit amet',
                'role_id' => 1,
                'location_id' => 1,
                'course_id' => 1,
                'product_id' => 1,
                'attachment_id' => 1,
                'created' => '2024-01-23',
                'modified' => '2024-01-23',
            ],
        ];
        parent::init();
    }
}

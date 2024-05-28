<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $phone_number
 * @property string $email
 * @property string $username
 * @property string $password
 * @property \Cake\I18n\Date|null $birth_date
 * @property string $profile_picture
 * @property string $marital_status
 * @property int $is_active
 * @property string $bio
 * @property int $role_id
 * @property int $location_id
 * @property int $course_id
 * @property int $product_id
 * @property int $attachment_id
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $buy_at
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Course $course
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'gender' => true,
        'phone_number' => true,
        'email' => true,
        'username' => true,
        'password' => true,
        'birth_date' => true,
        'profile_picture' => true,
        'marital_status' => true,
        'is_active' => true,
        'bio' => true,
        'role_id' => true,
        'location_id' => true,
        'course_id' => true,
        'product_id' => true,
        'attachment_id' => true,
        'role' => true,
        'location' => true,
        'course' => true,
        'created_at' => true,
        'buy_at' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected array $_hidden = [
        'password',
    ];
    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}

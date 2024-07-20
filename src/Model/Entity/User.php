<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $gender
 * @property string|null $phone_number
 * @property string|null $email
 * @property string|null $username
 * @property string|null $password
 * @property \Cake\I18n\Date|null $birth_date
 * @property string|null $profile_picture
 * @property string|null $marital_status
 * @property int|null $is_active
 * @property string|null $bio
 * @property int|null $role_id
 * @property int|null $location_id
 * @property int|null $course_id
 * @property int|null $product_id
 * @property int|null $attachment_id
 * @property int|null $courses_user_id
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Location $location
 * @property \Lms\Model\Entity\Course $course
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
        'courses_user_id' => true,
        'role' => true,
        'location' => true,
        'course' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected array $_hidden = [
        'password',
    ];
}

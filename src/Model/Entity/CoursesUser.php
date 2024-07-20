<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CoursesUser Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $course_id
 * @property int|null $learningpath_id
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\Learningpath $learningpath
 */
class CoursesUser extends Entity
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
        'user_id' => true,
        'course_id' => true,
        'learningpath_id' => true,
        'users' => true,
        'course' => true,
        'learningpath' => true,
    ];
}

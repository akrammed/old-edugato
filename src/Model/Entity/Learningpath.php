<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Learningpath Entity
 *
 * @property int $id
 * @property string|null $path
 * @property string|null $picture
 * @property int|null $is_free
 *
 * @property \App\Model\Entity\Candostatment[] $candostatments
 * @property \App\Model\Entity\CoursesUser[] $courses_users
 */
class Learningpath extends Entity
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
        'path' => true,
        'picture' => true,
        'is_free' => true,
        'candostatments' => true,
        'courses_users' => true,
    ];
}

<?php
declare(strict_types=1);

namespace Lms\Model\Entity;

use Cake\ORM\Entity;

/**
 * Level Entity
 *
 * @property int $id
 * @property string $level
 *
 * @property \Lms\Model\Entity\Course[] $courses
 */
class Level extends Entity
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
        'level' => true,
        'courses' => true,
    ];
}

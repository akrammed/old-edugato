<?php
declare(strict_types=1);

namespace Lms\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lesson Entity
 *
 * @property int $id
 * @property string $lesson
 * @property string|null  $description
 * @property int $course_id

 *
 * @property \Lms\Model\Entity\Chapter $chapter
 * @property \Lms\Model\Entity\Course[] $courses
 */
class Lesson extends Entity
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
        'lesson' => true,
        'description' => true,
        'course_id' => true,
        'chapter' => true,
        'courses' => true,
        'is_paid' => true,
    ];
}

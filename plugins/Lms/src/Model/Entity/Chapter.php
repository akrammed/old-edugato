<?php
declare(strict_types=1);

namespace Lms\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chapter Entity
 *
 * @property int $id
 * @property string $chapter
 * @property string $vedio
 * @property string $quizz
 * @property string|null $description
 * @property string|null $content
 * @property int $lesson_id

 *
 * @property \Lms\Model\Entity\Lesson[] $lessons
 */
class Chapter extends Entity
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
        'chapter' => true,
        'vedio' => true,
        'quizz_title' => true,
        'quizz' => true,
        'description' => true,
        'content' => true,
        'lesson_id' => true,
        'lessons' => true,
    ];
}

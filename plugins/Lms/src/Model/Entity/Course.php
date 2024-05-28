<?php
declare(strict_types=1);

namespace Lms\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity
 *
 * @property int $id
 * @property string $title
 * @property string $background_picture
 * @property string $picture
 * @property string|null $vedio_description
 * @property string $description
 * @property string $content
 * @property string $study_time
 * @property string $video_time
 * @property string $exams_number
 * @property int $is_active
 * @property int $is_paid
 * @property int|null $rating_id
 * @property int $category_id
 * @property int $level_id

 *
 * @property \Lms\Model\Entity\Lesson $lesson
 * @property \Lms\Model\Entity\Rating $rating
 * @property \Lms\Model\Entity\Level $level
 * @property \Lms\Model\Entity\User[] $users
 */
class Course extends Entity
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
        'title' => true,
        'picture'=> true,
        'background_picture' => true,
        'vedio_description' => true,
        'description' => true,
        'content' => true,
        'study_time' => true,
        'video_time' => true,
        'exams_number' => true,
        'is_active' => true,
        'is_paid' => true,
        'rating_id' => true,
        'category_id' => true,
        'level_id' => true,
        'lesson' => true,
        'rating' => true,
        'level' => true,
        'users' => true,
    ];
}

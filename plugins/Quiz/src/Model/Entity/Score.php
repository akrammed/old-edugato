<?php
declare(strict_types=1);

namespace Quiz\Model\Entity;

use Cake\ORM\Entity;

/**
 * Score Entity
 *
 * @property int $id
 * @property string|null $point
 * @property string|null $attempt
 * @property int|null $quiz_id
 * @property string|null $time
 * @property string|null $faild
 * @property int|null $user_id
 */
class Score extends Entity
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
        'point' => true,
        'attempt' => true,
        'quiz_id' => true,
        'time' => true,
        'faild' => true,
        'user_id' => true,
    ];
}

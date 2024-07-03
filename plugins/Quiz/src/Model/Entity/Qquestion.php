<?php
declare(strict_types=1);

namespace Quiz\Model\Entity;

use Cake\ORM\Entity;

/**
 * Qquestion Entity
 *
 * @property int $id
 * @property string|null $question
 * @property string|null $palette
 * @property string|null $oorder
 * @property int|null $is_correct
 * @property int|null $quiz_id
 */
class Qquestion extends Entity
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
        'question' => true,
        'palette' => true,
        'oorder' => true,
        'is_correct' => true,
        'quiz_id' => true,
    ];
}

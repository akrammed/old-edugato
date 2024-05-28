<?php
declare(strict_types=1);

namespace Quiz\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quiz Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property int|null $quiztype_id
 *
 * @property \Quiz\Model\Entity\Quiztype $quiztype
 */
class Quiz extends Entity
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
        'description' => true,
        'quiztype_id' => true,
    ];
}

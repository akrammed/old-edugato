<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Candostatment Entity
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $learningpath_id
 *
 * @property \App\Model\Entity\Learningpath $learningpath
 * @property \App\Model\Entity\Short[] $shorts
 */
class Candostatment extends Entity
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
        'learningpath_id' => true,
        'learningpath' => true,
        'shorts' => true,
    ];
}

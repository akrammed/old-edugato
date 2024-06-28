<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Short Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $video
 * @property int|null $short_type_id
 * @property int|null $candostatment_id
 *
 * @property \App\Model\Entity\ShortType $short_type
 */
class Short extends Entity
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
        'video' => true,
        'short_type_id' => true,
        'short_type' => true,
        'candostatment_id' => true,
    ];
}

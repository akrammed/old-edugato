<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Learningpath Entity
 *
 * @property int $id
 * @property string|null $path
 * @property int|null $picture
 *
 * @property \App\Model\Entity\Candostatment[] $candostatments
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
        'candostatments' => true,
    ];
}

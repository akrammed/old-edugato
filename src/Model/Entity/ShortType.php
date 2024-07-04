<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShortType Entity
 *
 * @property int $id
 * @property string|null $type
 * @property int|null $user_id
 * @property int|null $category_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Short[] $shorts
 */
class ShortType extends Entity
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
        'type' => true,
        'user_id' => true,
        'category_id' => true,
        'user' => true,
        'shorts' => true,
    ];
}

<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Test Entity
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string $question
 * @property string|null $question_2
 * @property string|null $question_3
 * @property string|null $question_4
 * @property string|null $question_5
 * @property string|null $question_6
 * @property string|null $question_7
 * @property string|null $option_1
 * @property string|null $option_2
 * @property string|null $option_3
 * @property string|null $option_4
 * @property string|null $option_5
 * @property string|null $option_6
 * @property string|null $option_7
 * @property string|null $option_8
 * @property string|null $correct
 *
 * @property \App\Model\Entity\Testtype $testtype
 */
class Test extends Entity
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
        'question' => true,
        'question_2' => true,
        'question_3' => true,
        'question_4' => true,
        'question_5' => true,
        'question_6' => true,
        'question_7' => true,
        'option_1' => true,
        'option_2' => true,
        'option_3' => true,
        'option_4' => true,
        'option_5' => true,
        'option_6' => true,
        'option_7' => true,
        'option_8' => true,
        'correct' => true,
        'testtype' => true,
    ];
}

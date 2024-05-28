<?php
declare(strict_types=1);

namespace Lms\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Levels Model
 *
 * @property \Lms\Model\Table\CoursesTable&\Cake\ORM\Association\HasMany $Courses
 *
 * @method \Lms\Model\Entity\Level newEmptyEntity()
 * @method \Lms\Model\Entity\Level newEntity(array $data, array $options = [])
 * @method array<\Lms\Model\Entity\Level> newEntities(array $data, array $options = [])
 * @method \Lms\Model\Entity\Level get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Lms\Model\Entity\Level findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Lms\Model\Entity\Level patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Lms\Model\Entity\Level> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Lms\Model\Entity\Level|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Lms\Model\Entity\Level saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Lms\Model\Entity\Level>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Level>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Level>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Level> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Level>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Level>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Level>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Level> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LevelsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('levels');
        $this->setDisplayField('level');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Courses', [
            'foreignKey' => 'level_id',
            'className' => 'Lms.Courses',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('level')
            ->maxLength('level', 255)
            ->requirePresence('level', 'create')
            ->notEmptyString('level');

        return $validator;
    }
}

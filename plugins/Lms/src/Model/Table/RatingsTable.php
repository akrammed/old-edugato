<?php
declare(strict_types=1);

namespace Lms\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ratings Model
 *
 * @property \Lms\Model\Table\CoursesTable&\Cake\ORM\Association\HasMany $Courses
 *
 * @method \Lms\Model\Entity\Rating newEmptyEntity()
 * @method \Lms\Model\Entity\Rating newEntity(array $data, array $options = [])
 * @method array<\Lms\Model\Entity\Rating> newEntities(array $data, array $options = [])
 * @method \Lms\Model\Entity\Rating get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Lms\Model\Entity\Rating findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Lms\Model\Entity\Rating patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Lms\Model\Entity\Rating> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Lms\Model\Entity\Rating|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Lms\Model\Entity\Rating saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Lms\Model\Entity\Rating>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Rating>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Rating>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Rating> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Rating>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Rating>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Rating>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Rating> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RatingsTable extends Table
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

        $this->setTable('ratings');
        $this->setDisplayField('rating');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Courses', [
            'foreignKey' => 'rating_id',
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
            ->scalar('rating')
            ->maxLength('rating', 255)
            ->requirePresence('rating', 'create')
            ->notEmptyString('rating');

        return $validator;
    }
}

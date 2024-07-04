<?php
declare(strict_types=1);

namespace Lms\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categorys Model
 *
 * @property \Lms\Model\Table\CoursesTable&\Cake\ORM\Association\HasMany $Courses
 *
 * @method \Lms\Model\Entity\Category newEmptyEntity()
 * @method \Lms\Model\Entity\Category newEntity(array $data, array $options = [])
 * @method array<\Lms\Model\Entity\Category> newEntities(array $data, array $options = [])
 * @method \Lms\Model\Entity\Category get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Lms\Model\Entity\Category findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Lms\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Lms\Model\Entity\Category> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Lms\Model\Entity\Category|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Lms\Model\Entity\Category saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Lms\Model\Entity\Category>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Category>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Category>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Category> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Category>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Category>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Category>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Category> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CategorysTable extends Table
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

        $this->setTable('categorys');
        $this->setDisplayField('category');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Courses', [
            'foreignKey' => 'category_id',
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
            ->scalar('category')
            ->maxLength('category', 255)
            ->requirePresence('category', 'create')
            ->notEmptyString('category');

        $validator
            ->scalar('picture')
            ->maxLength('picture', 255)
            ->requirePresence('picture', 'create')
            ->notEmptyString('picture');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}

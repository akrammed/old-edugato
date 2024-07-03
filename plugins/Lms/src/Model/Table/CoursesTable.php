<?php
declare(strict_types=1);

namespace Lms\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courses Model
 *
 * @property \Lms\Model\Table\RatingsTable&\Cake\ORM\Association\BelongsTo $Ratings
 * @property \Lms\Model\Table\LevelsTable&\Cake\ORM\Association\BelongsTo $Levels
 * @property \Lms\Model\Table\LevelsTable&\Cake\ORM\Association\BelongsTo $Category
 * @property \Lms\Model\Table\LessonsTable&\Cake\ORM\Association\HasMany $Lessons
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \Lms\Model\Entity\Course newEmptyEntity()
 * @method \Lms\Model\Entity\Course newEntity(array $data, array $options = [])
 * @method array<\Lms\Model\Entity\Course> newEntities(array $data, array $options = [])
 * @method \Lms\Model\Entity\Course get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Lms\Model\Entity\Course findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Lms\Model\Entity\Course patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Lms\Model\Entity\Course> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Lms\Model\Entity\Course|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Lms\Model\Entity\Course saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Lms\Model\Entity\Course>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Course>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Course>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Course> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Course>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Course>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Course>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Course> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CoursesTable extends Table
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

        $this->setTable('courses');
        $this->setAlias('Courses');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ratings', [
            'foreignKey' => 'rating_id',
            'className' => 'Lms.Ratings',
        ]);
        $this->belongsTo('Levels', [
            'foreignKey' => 'level_id',
            'joinType' => 'INNER',
            'className' => 'Lms.Levels',
        ]);
        $this->belongsTo('Categorys', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
            'className' => 'Lms.Categorys',
        ]);
        $this->hasMany('Lessons', [
            'foreignKey' => 'course_id',
            'className' => 'Lms.Lessons',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'course_id',
            'className' => 'Users',
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('rating_id', 'Ratings'), ['errorField' => 'rating_id']);
        $rules->add($rules->existsIn('level_id', 'Levels'), ['errorField' => 'level_id']);
        $rules->add($rules->existsIn('category_id', 'Categorys'), ['errorField' => 'level_id']);

        return $rules;
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Courses Model
 *
 * @property \App\Model\Table\RatingsTable&\Cake\ORM\Association\BelongsTo $Ratings
 * @property \App\Model\Table\LevelsTable&\Cake\ORM\Association\BelongsTo $Levels
 * @property \App\Model\Table\LessonsTable&\Cake\ORM\Association\HasMany $Lessons
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Course newEmptyEntity()
 * @method \App\Model\Entity\Course newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Course> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Course get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Course findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Course patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Course> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Course|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Course saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Course>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Course>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Course>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Course> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Course>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Course>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Course>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Course> deleteManyOrFail(iterable $entities, array $options = [])
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
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Ratings', [
            'foreignKey' => 'rating_id',
        ]);
        $this->belongsTo('Levels', [
            'foreignKey' => 'level_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Lessons', [
            'foreignKey' => 'course_id',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'course_id',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'course_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'courses_users',
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

        $validator
            ->scalar('background_picture')
            ->maxLength('background_picture', 255)
            ->requirePresence('background_picture', 'create')
            ->notEmptyString('background_picture');

        $validator
            ->scalar('picture')
            ->maxLength('picture', 255)
            ->requirePresence('picture', 'create')
            ->notEmptyString('picture');

        $validator
            ->scalar('vedio_description')
            ->maxLength('vedio_description', 255)
            ->allowEmptyString('vedio_description');

        $validator
            ->scalar('description')
            ->maxLength('description', 2000)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('content')
            ->maxLength('content', 5000)
            ->requirePresence('content', 'create')
            ->notEmptyString('content');

        $validator
            ->scalar('study_time')
            ->maxLength('study_time', 255)
            ->requirePresence('study_time', 'create')
            ->notEmptyString('study_time');

        $validator
            ->scalar('video_time')
            ->maxLength('video_time', 255)
            ->requirePresence('video_time', 'create')
            ->notEmptyString('video_time');

        $validator
            ->scalar('exams_number')
            ->maxLength('exams_number', 255)
            ->requirePresence('exams_number', 'create')
            ->notEmptyString('exams_number');

        $validator
            ->notEmptyString('is_active');

        $validator
            ->notEmptyString('is_paid');

        $validator
            ->integer('rating_id')
            ->allowEmptyString('rating_id');

        $validator
            ->integer('category_id')
            ->requirePresence('category_id', 'create')
            ->notEmptyString('category_id');

        $validator
            ->integer('level_id')
            ->notEmptyString('level_id');

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

        return $rules;
    }
}

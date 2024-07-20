<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoursesUsers Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CoursesTable&\Cake\ORM\Association\BelongsTo $Courses
 * @property \App\Model\Table\LearningpathsTable&\Cake\ORM\Association\BelongsTo $Learningpaths
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\CoursesUser newEmptyEntity()
 * @method \App\Model\Entity\CoursesUser newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CoursesUser> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CoursesUser get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CoursesUser findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CoursesUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CoursesUser> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CoursesUser|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CoursesUser saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CoursesUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CoursesUser>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CoursesUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CoursesUser> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CoursesUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CoursesUser>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CoursesUser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CoursesUser> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CoursesUsersTable extends Table
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

        $this->setTable('courses_users');
        $this->setAlias('CoursesUsers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
        ]);
        $this->belongsTo('Learningpaths', [
            'foreignKey' => 'learningpath_id',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'courses_user_id',
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
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('course_id')
            ->allowEmptyString('course_id');

        $validator
            ->integer('learningpath_id')
            ->allowEmptyString('learningpath_id');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('course_id', 'Courses'), ['errorField' => 'course_id']);
        $rules->add($rules->existsIn('learningpath_id', 'Learningpaths'), ['errorField' => 'learningpath_id']);

        return $rules;
    }
}

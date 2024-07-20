<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 * @property \Lms\Model\Table\CoursesTable&\Cake\ORM\Association\BelongsTo $Courses
 * @property \Lms\Model\Table\CoursesTable&\Cake\ORM\Association\BelongsToMany $Courses
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
        ]);
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
        ]);
        $this->belongsTo('CoursesUsers', [
            'foreignKey' => 'courses_user_id',
        ]);
        $this->hasMany('ShortTypes', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsToMany('Courses', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'course_id',
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
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->allowEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('gender')
            ->allowEmptyString('gender');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 255)
            ->allowEmptyString('phone_number');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->allowEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmptyString('password');

        $validator
            ->date('birth_date')
            ->allowEmptyDate('birth_date');

        $validator
            ->scalar('profile_picture')
            ->maxLength('profile_picture', 255)
            ->allowEmptyString('profile_picture');

        $validator
            ->scalar('marital_status')
            ->allowEmptyString('marital_status');

        $validator
            ->allowEmptyString('is_active');

        $validator
            ->scalar('bio')
            ->maxLength('bio', 1000)
            ->allowEmptyString('bio');

        $validator
            ->integer('role_id')
            ->allowEmptyString('role_id');

        $validator
            ->integer('location_id')
            ->allowEmptyString('location_id');

        $validator
            ->integer('course_id')
            ->allowEmptyString('course_id');

        $validator
            ->integer('product_id')
            ->allowEmptyString('product_id');

        $validator
            ->integer('attachment_id')
            ->allowEmptyString('attachment_id');

        $validator
            ->integer('courses_user_id')
            ->allowEmptyString('courses_user_id');

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
        $rules->add($rules->existsIn('role_id', 'Roles'), ['errorField' => 'role_id']);
        $rules->add($rules->existsIn('location_id', 'Locations'), ['errorField' => 'location_id']);
        $rules->add($rules->existsIn('course_id', 'Courses'), ['errorField' => 'course_id']);
        $rules->add($rules->existsIn('courses_user_id', 'CoursesUsers'), ['errorField' => 'courses_user_id']);

        return $rules;
    }
}

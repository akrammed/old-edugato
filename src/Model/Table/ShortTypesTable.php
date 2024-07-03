<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShortTypes Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ShortsTable&\Cake\ORM\Association\HasMany $Shorts
 *
 * @method \App\Model\Entity\ShortType newEmptyEntity()
 * @method \App\Model\Entity\ShortType newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ShortType> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShortType get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ShortType findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ShortType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ShortType> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShortType|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ShortType saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ShortType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ShortType>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ShortType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ShortType> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ShortType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ShortType>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ShortType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ShortType> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ShortTypesTable extends Table
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

        $this->setTable('short_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Shorts', [
            'foreignKey' => 'short_type_id',
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
            ->scalar('type')
            ->maxLength('type', 255)
            ->allowEmptyString('type');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('category_id')
            ->allowEmptyString('category_id');

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

        return $rules;
    }
}

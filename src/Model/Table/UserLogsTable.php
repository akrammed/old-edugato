<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserLogs Model
 *
 * @method \App\Model\Entity\UserLog newEmptyEntity()
 * @method \App\Model\Entity\UserLog newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\UserLog> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserLog get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\UserLog findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\UserLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\UserLog> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserLog|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\UserLog saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\UserLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UserLog>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UserLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UserLog> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UserLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UserLog>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UserLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UserLog> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UserLogsTable extends Table
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

        $this->setTable('user_logs');
        $this->setDisplayField('id_user');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'id_user',
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
            ->scalar('id_user')
            ->maxLength('id_user', 255)
            ->requirePresence('id_user', 'create')
            ->notEmptyString('id_user');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        return $validator;
    }
}

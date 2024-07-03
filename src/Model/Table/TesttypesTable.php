<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Testtypes Model
 *
 * @property \App\Model\Table\TestsTable&\Cake\ORM\Association\HasMany $Tests
 *
 * @method \App\Model\Entity\Testtype newEmptyEntity()
 * @method \App\Model\Entity\Testtype newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Testtype> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Testtype get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Testtype findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Testtype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Testtype> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Testtype|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Testtype saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Testtype>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Testtype>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Testtype>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Testtype> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Testtype>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Testtype>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Testtype>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Testtype> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TesttypesTable extends Table
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

        $this->setTable('testtypes');
        $this->setDisplayField('type');
        $this->setPrimaryKey('id');

   
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
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        return $validator;
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Options Model
 *
 * @method \App\Model\Entity\Option newEmptyEntity()
 * @method \App\Model\Entity\Option newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Option> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Option get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Option findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Option patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Option> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Option|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Option saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Option>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Option>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Option>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Option> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Option>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Option>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Option>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Option> deleteManyOrFail(iterable $entities, array $options = [])
 */
class OptionsTable extends Table
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

        $this->setTable('options');
        $this->setDisplayField('id');
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
            ->scalar('qoption')
            ->maxLength('qoption', 255)
            ->allowEmptyString('qoption');

        $validator
            ->allowEmptyString('is_correct');

        $validator
            ->scalar('oorder')
            ->maxLength('oorder', 255)
            ->allowEmptyString('oorder');

        $validator
            ->scalar('palette')
            ->maxLength('palette', 255)
            ->allowEmptyString('palette');

        $validator
            ->scalar('imageName')
            ->maxLength('imageName', 255)
            ->allowEmptyString('imageName');

        $validator
            ->integer('quiz_id')
            ->allowEmptyString('quiz_id');

        return $validator;
    }
}

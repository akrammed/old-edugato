<?php
declare(strict_types=1);

namespace Quiz\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Qoptions Model
 *
 * @method \Quiz\Model\Entity\Qoption newEmptyEntity()
 * @method \Quiz\Model\Entity\Qoption newEntity(array $data, array $options = [])
 * @method array<\Quiz\Model\Entity\Qoption> newEntities(array $data, array $options = [])
 * @method \Quiz\Model\Entity\Qoption get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Quiz\Model\Entity\Qoption findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Quiz\Model\Entity\Qoption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Quiz\Model\Entity\Qoption> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Quiz\Model\Entity\Qoption|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Quiz\Model\Entity\Qoption saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Qoption>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Qoption>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Qoption>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Qoption> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Qoption>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Qoption>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Qoption>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Qoption> deleteManyOrFail(iterable $entities, array $options = [])
 */
class QoptionsTable extends Table
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

        $this->setTable('qoptions');
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
            ->integer('quiz_id')
            ->allowEmptyString('quiz_id');

        return $validator;
    }
}

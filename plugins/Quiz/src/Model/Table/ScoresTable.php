<?php
declare(strict_types=1);

namespace Quiz\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Scores Model
 *
 * @method \Quiz\Model\Entity\Score newEmptyEntity()
 * @method \Quiz\Model\Entity\Score newEntity(array $data, array $options = [])
 * @method array<\Quiz\Model\Entity\Score> newEntities(array $data, array $options = [])
 * @method \Quiz\Model\Entity\Score get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Quiz\Model\Entity\Score findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Quiz\Model\Entity\Score patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Quiz\Model\Entity\Score> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Quiz\Model\Entity\Score|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Quiz\Model\Entity\Score saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Score>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Score>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Score>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Score> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Score>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Score>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Score>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Score> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ScoresTable extends Table
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

        $this->setTable('scores');
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
            ->scalar('point')
            ->maxLength('point', 255)
            ->allowEmptyString('point');


        return $validator;
    }
}

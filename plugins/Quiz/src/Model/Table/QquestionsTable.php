<?php
declare(strict_types=1);

namespace Quiz\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Qquestions Model
 *
 * @method \Quiz\Model\Entity\Qquestion newEmptyEntity()
 * @method \Quiz\Model\Entity\Qquestion newEntity(array $data, array $options = [])
 * @method array<\Quiz\Model\Entity\Qquestion> newEntities(array $data, array $options = [])
 * @method \Quiz\Model\Entity\Qquestion get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Quiz\Model\Entity\Qquestion findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Quiz\Model\Entity\Qquestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Quiz\Model\Entity\Qquestion> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Quiz\Model\Entity\Qquestion|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Quiz\Model\Entity\Qquestion saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Qquestion>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Qquestion>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Qquestion>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Qquestion> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Qquestion>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Qquestion>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Qquestion>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Qquestion> deleteManyOrFail(iterable $entities, array $options = [])
 */
class QquestionsTable extends Table
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

        $this->setTable('qquestions');
        $this->setAlias('qquestions');
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
            ->scalar('question')
            ->maxLength('question', 255)
            ->allowEmptyString('question');

        $validator
            ->allowEmptyString('is_correct');

        $validator
            ->integer('quiz_id')
            ->allowEmptyString('quiz_id');

        return $validator;
    }
}

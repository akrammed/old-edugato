<?php
declare(strict_types=1);

namespace Quiz\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quizs Model
 *
 * @property \Quiz\Model\Table\QuiztypesTable&\Cake\ORM\Association\BelongsTo $Quiztypes
 *
 * @method \Quiz\Model\Entity\Quiz newEmptyEntity()
 * @method \Quiz\Model\Entity\Quiz newEntity(array $data, array $options = [])
 * @method array<\Quiz\Model\Entity\Quiz> newEntities(array $data, array $options = [])
 * @method \Quiz\Model\Entity\Quiz get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Quiz\Model\Entity\Quiz findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Quiz\Model\Entity\Quiz patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Quiz\Model\Entity\Quiz> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Quiz\Model\Entity\Quiz|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Quiz\Model\Entity\Quiz saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Quiz>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Quiz> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Quiz>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Quiz> deleteManyOrFail(iterable $entities, array $options = [])
 */
class QuizsTable extends Table
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

        $this->setTable('quizs');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Quiztypes', [
            'foreignKey' => 'quiztype_id',
            'className' => 'Quiz.Quiztypes',
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
            ->maxLength('title', 250)
            ->allowEmptyString('title');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        $validator
            ->integer('quiztype_id')
            ->allowEmptyString('quiztype_id');

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
        $rules->add($rules->existsIn(['quiztype_id'], 'Quiztypes'), ['errorField' => 'quiztype_id']);

        return $rules;
    }
}

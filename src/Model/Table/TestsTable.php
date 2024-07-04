<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tests Model
 *
 * @method \App\Model\Entity\Test newEmptyEntity()
 * @method \App\Model\Entity\Test newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Test> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Test get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Test findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Test patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Test> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Test|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Test saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Test>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Test>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Test>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Test> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Test>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Test>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Test>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Test> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TestsTable extends Table
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

        $this->setTable('tests');
        $this->setDisplayField('title');
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
            ->scalar('title')
            ->maxLength('title', 250)
            ->allowEmptyString('title');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        $validator
            ->scalar('question')
            ->maxLength('question', 255)
            ->requirePresence('question', 'create')
            ->notEmptyString('question');

        $validator
            ->scalar('question_2')
            ->maxLength('question_2', 255)
            ->allowEmptyString('question_2');

        $validator
            ->scalar('question_3')
            ->maxLength('question_3', 255)
            ->allowEmptyString('question_3');

        $validator
            ->scalar('question_4')
            ->maxLength('question_4', 255)
            ->allowEmptyString('question_4');

        $validator
            ->scalar('question_5')
            ->maxLength('question_5', 255)
            ->allowEmptyString('question_5');

        $validator
            ->scalar('question_6')
            ->maxLength('question_6', 255)
            ->allowEmptyString('question_6');

        $validator
            ->scalar('question_7')
            ->maxLength('question_7', 255)
            ->allowEmptyString('question_7');

        $validator
            ->scalar('option_1')
            ->maxLength('option_1', 255)
            ->allowEmptyString('option_1');

        $validator
            ->scalar('option_2')
            ->maxLength('option_2', 255)
            ->allowEmptyString('option_2');

        $validator
            ->scalar('option_3')
            ->maxLength('option_3', 255)
            ->allowEmptyString('option_3');

        $validator
            ->scalar('option_4')
            ->maxLength('option_4', 255)
            ->allowEmptyString('option_4');

        $validator
            ->scalar('option_5')
            ->maxLength('option_5', 255)
            ->allowEmptyString('option_5');

        $validator
            ->scalar('option_6')
            ->maxLength('option_6', 255)
            ->allowEmptyString('option_6');

        $validator
            ->scalar('option_7')
            ->maxLength('option_7', 255)
            ->allowEmptyString('option_7');

        $validator
            ->scalar('option_8')
            ->maxLength('option_8', 255)
            ->allowEmptyString('option_8');

        $validator
            ->scalar('correct')
            ->maxLength('correct', 255)
            ->allowEmptyString('correct');

        return $validator;
    }
}

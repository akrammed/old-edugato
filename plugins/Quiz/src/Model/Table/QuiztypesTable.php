<?php
declare(strict_types=1);

namespace Quiz\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quiztypes Model
 *
 * @property \Quiz\Model\Table\QuizsTable&\Cake\ORM\Association\HasMany $Quizs
 *
 * @method \Quiz\Model\Entity\Quiztype newEmptyEntity()
 * @method \Quiz\Model\Entity\Quiztype newEntity(array $data, array $options = [])
 * @method array<\Quiz\Model\Entity\Quiztype> newEntities(array $data, array $options = [])
 * @method \Quiz\Model\Entity\Quiztype get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Quiz\Model\Entity\Quiztype findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Quiz\Model\Entity\Quiztype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Quiz\Model\Entity\Quiztype> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Quiz\Model\Entity\Quiztype|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Quiz\Model\Entity\Quiztype saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Quiztype>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Quiztype>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Quiztype>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Quiztype> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Quiztype>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Quiztype>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Quiz\Model\Entity\Quiztype>|\Cake\Datasource\ResultSetInterface<\Quiz\Model\Entity\Quiztype> deleteManyOrFail(iterable $entities, array $options = [])
 */
class QuiztypesTable extends Table
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

        $this->setTable('quiztypes');
        $this->setDisplayField('type');
        $this->setPrimaryKey('id');

        $this->hasMany('Quizs', [
            'foreignKey' => 'quiztype_id',
            'className' => 'Quiz.Quizs',
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
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        return $validator;
    }
}

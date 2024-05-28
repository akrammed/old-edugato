<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quiztypes Model
 *
 * @property \App\Model\Table\QuizsTable&\Cake\ORM\Association\HasMany $Quizs
 *
 * @method \App\Model\Entity\Quiztype newEmptyEntity()
 * @method \App\Model\Entity\Quiztype newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Quiztype> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quiztype get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Quiztype findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Quiztype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Quiztype> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quiztype|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Quiztype saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Quiztype>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiztype>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quiztype>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiztype> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quiztype>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiztype>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quiztype>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiztype> deleteManyOrFail(iterable $entities, array $options = [])
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

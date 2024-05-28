<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quizs Model
 *
 * @property \App\Model\Table\QuiztypesTable&\Cake\ORM\Association\BelongsTo $Quiztypes
 * @property \App\Model\Table\OptionsTable&\Cake\ORM\Association\HasMany $Options
 * @property \App\Model\Table\QcorrectTable&\Cake\ORM\Association\HasMany $Qcorrect
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\HasMany $Questions
 * @property \App\Model\Table\ScoresTable&\Cake\ORM\Association\HasMany $Scores
 *
 * @method \App\Model\Entity\Quiz newEmptyEntity()
 * @method \App\Model\Entity\Quiz newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Quiz> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quiz get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Quiz findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Quiz patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Quiz> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quiz|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Quiz saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiz>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiz> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiz>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quiz>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quiz> deleteManyOrFail(iterable $entities, array $options = [])
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
        $this->setAlias('quizs');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Quiztypes', [
            'foreignKey' => 'quiztype_id',
        ]);
        $this->hasMany('Options', [
            'foreignKey' => 'quiz_id',
        ]);
        $this->hasMany('Qcorrect', [
            'foreignKey' => 'quiz_id',
        ]);
        $this->hasMany('Questions', [
            'foreignKey' => 'quiz_id',
        ]);
        $this->hasMany('Scores', [
            'foreignKey' => 'quiz_id',
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
        $rules->add($rules->existsIn('quiztype_id', 'Quiztypes'), ['errorField' => 'quiztype_id']);

        return $rules;
    }
}

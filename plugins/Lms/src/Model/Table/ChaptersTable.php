<?php
declare(strict_types=1);

namespace Lms\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chapters Model
 *
 * @property \Lms\Model\Table\LessonsTable&\Cake\ORM\Association\BelongsTo $Lessons
 *
 * @method \Lms\Model\Entity\Chapter newEmptyEntity()
 * @method \Lms\Model\Entity\Chapter newEntity(array $data, array $options = [])
 * @method array<\Lms\Model\Entity\Chapter> newEntities(array $data, array $options = [])
 * @method \Lms\Model\Entity\Chapter get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Lms\Model\Entity\Chapter findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Lms\Model\Entity\Chapter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Lms\Model\Entity\Chapter> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Lms\Model\Entity\Chapter|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Lms\Model\Entity\Chapter saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Lms\Model\Entity\Chapter>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Chapter>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Chapter>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Chapter> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Chapter>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Chapter>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Lms\Model\Entity\Chapter>|\Cake\Datasource\ResultSetInterface<\Lms\Model\Entity\Chapter> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChaptersTable extends Table
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

        $this->setTable('chapters');
        $this->setDisplayField('chapter');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Lessons', [
            'foreignKey' => 'lesson_id',
            'joinType' => 'INNER',
            'className' => 'Lms.Lessons',
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
            ->scalar('chapter')
            ->maxLength('chapter', 255)
            ->requirePresence('chapter', 'create')
            ->notEmptyString('chapter');

        $validator
            ->scalar('vedio')
            ->maxLength('vedio', 255)
            ->notEmptyString('vedio');

        $validator
            ->scalar('quizz')
            ->maxLength('quizz', 255)
       
            ->notEmptyString('quizz');

        $validator
            ->scalar('quizz_title')
            ->maxLength('quizz_title', 255)
 
            ->notEmptyString('quizz_title');

       
        $validator
            ->integer('lesson_id')
            ->notEmptyString('lesson_id');

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
        $rules->add($rules->existsIn('lesson_id', 'Lessons'), ['errorField' => 'lesson_id']);

        return $rules;
    }
}

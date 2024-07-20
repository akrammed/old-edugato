<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Candostatments Model
 *
 * @property \App\Model\Table\LearningpathsTable&\Cake\ORM\Association\BelongsTo $Learningpaths
 * @property \App\Model\Table\ShortsTable&\Cake\ORM\Association\HasMany $Shorts
 *
 * @method \App\Model\Entity\Candostatment newEmptyEntity()
 * @method \App\Model\Entity\Candostatment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Candostatment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Candostatment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Candostatment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Candostatment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Candostatment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Candostatment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Candostatment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Candostatment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Candostatment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Candostatment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Candostatment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Candostatment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Candostatment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Candostatment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Candostatment> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CandostatmentsTable extends Table
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

        $this->setTable('candostatments');
        $this->setAlias('Candostatments');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Learningpaths', [
            'foreignKey' => 'learningpath_id',
        ]);
        $this->hasMany('Shorts', [
            'foreignKey' => 'candostatment_id',
            'className' => 'Shorts',
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
            ->maxLength('title', 255)
            ->allowEmptyString('title');

        $validator
            ->integer('learningpath_id')
            ->allowEmptyString('learningpath_id');

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
        $rules->add($rules->existsIn(['learningpath_id'], 'Learningpaths'), ['errorField' => 'learningpath_id']);

        return $rules;
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shorts Model
 *
 * @property \App\Model\Table\ShortTypesTable&\Cake\ORM\Association\BelongsTo $ShortTypes
 *
 * @method \App\Model\Entity\Short newEmptyEntity()
 * @method \App\Model\Entity\Short newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Short> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Short get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Short findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Short patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Short> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Short|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Short saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Short>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Short>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Short>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Short> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Short>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Short>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Short>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Short> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ShortsTable extends Table
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

        $this->setTable('shorts');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('ShortTypes', [
            'foreignKey' => 'short_type_id',
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
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        $validator
            ->scalar('video')
            ->maxLength('video', 255)
            ->allowEmptyString('video');

        $validator
            ->integer('short_type_id')
            ->allowEmptyString('short_type_id');

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
        $rules->add($rules->existsIn('short_type_id', 'ShortTypes'), ['errorField' => 'short_type_id']);

        return $rules;
    }
}

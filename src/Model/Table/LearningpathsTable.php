<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Learningpaths Model
 *
 * @property \App\Model\Table\CandostatmentsTable&\Cake\ORM\Association\HasMany $Candostatments
 * @property \App\Model\Table\CoursesUsersTable&\Cake\ORM\Association\HasMany $CoursesUsers
 *
 * @method \App\Model\Entity\Learningpath newEmptyEntity()
 * @method \App\Model\Entity\Learningpath newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Learningpath> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Learningpath get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Learningpath findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Learningpath patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Learningpath> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Learningpath|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Learningpath saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Learningpath>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Learningpath>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Learningpath>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Learningpath> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Learningpath>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Learningpath>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Learningpath>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Learningpath> deleteManyOrFail(iterable $entities, array $options = [])
 */
class LearningpathsTable extends Table
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

        $this->setTable('learningpaths');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Candostatments', [
            'foreignKey' => 'learningpath_id',
        ]);
        $this->hasMany('CoursesUsers', [
            'foreignKey' => 'learningpath_id',
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
            ->scalar('path')
            ->maxLength('path', 255)
            ->allowEmptyString('path');

        $validator
            ->scalar('picture')
            ->maxLength('picture', 255)
            ->allowEmptyString('picture');

        $validator
            ->allowEmptyString('is_free');

        return $validator;
    }
}

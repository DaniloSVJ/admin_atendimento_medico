<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tratamento Model
 *
 * @method \App\Model\Entity\Tratamento newEmptyEntity()
 * @method \App\Model\Entity\Tratamento newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tratamento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tratamento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tratamento findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tratamento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tratamento[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tratamento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tratamento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tratamento[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tratamento[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tratamento[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tratamento[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TratamentoTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tratamento');
        $this->setDisplayField('nome');
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 255)
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 255)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        return $validator;
    }
}

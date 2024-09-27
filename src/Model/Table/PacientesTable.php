<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pacientes Model
 *
 * @property \App\Model\Table\AtendimentoTable&\Cake\ORM\Association\HasMany $Atendimento
 *
 * @method \App\Model\Entity\Paciente newEmptyEntity()
 * @method \App\Model\Entity\Paciente newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Paciente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paciente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paciente findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Paciente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paciente[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paciente|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paciente saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paciente[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paciente[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paciente[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paciente[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PacientesTable extends Table
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

        $this->setTable('pacientes');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Atendimento', [
            'foreignKey' => 'paciente_id',
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 255)
            ->requirePresence('cpf', 'create')
            ->notEmptyString('cpf');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }
}

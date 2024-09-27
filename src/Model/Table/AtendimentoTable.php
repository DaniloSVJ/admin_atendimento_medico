<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Atendimento Model
 *
 * @property \App\Model\Table\MedicosTable&\Cake\ORM\Association\BelongsTo $Medicos
 * @property \App\Model\Table\PacientesTable&\Cake\ORM\Association\BelongsTo $Pacientes
 *
 * @method \App\Model\Entity\Atendimento newEmptyEntity()
 * @method \App\Model\Entity\Atendimento newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Atendimento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Atendimento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Atendimento findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Atendimento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Atendimento[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Atendimento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Atendimento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Atendimento[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Atendimento[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Atendimento[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Atendimento[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AtendimentoTable extends Table
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

        $this->setTable('atendimento');
        $this->setDisplayField('sala');
        $this->setPrimaryKey('id');

        $this->belongsTo('Medicos', [
            'foreignKey' => 'medico_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Pacientes', [
            'foreignKey' => 'paciente_id',
            'joinType' => 'INNER',
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
            ->integer('medico_id')
            ->notEmptyString('medico_id');

        $validator
            ->integer('paciente_id')
            ->notEmptyString('paciente_id');

        $validator
            ->scalar('sala')
            ->maxLength('sala', 255)
            ->requirePresence('sala', 'create')
            ->notEmptyString('sala');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        $validator
            ->scalar('diagnostico')
            ->requirePresence('diagnostico', 'create')
            ->notEmptyString('diagnostico');

        $validator
            ->scalar('tratamento')
            ->requirePresence('tratamento', 'create')
            ->notEmptyString('tratamento');

        $validator
            ->date('data_inicio')
            ->requirePresence('data_inicio', 'create')
            ->notEmptyDate('data_inicio');

        $validator
            ->date('data_fim')
            ->allowEmptyDate('data_fim');

        $validator
            ->scalar('status')
            ->maxLength('status', 50)
            ->notEmptyString('status');

        $validator
            ->scalar('observacoes')
            ->allowEmptyString('observacoes');


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
        $rules->add($rules->existsIn('medico_id', 'Medicos'), ['errorField' => 'medico_id']);
        $rules->add($rules->existsIn('paciente_id', 'Pacientes'), ['errorField' => 'paciente_id']);

        return $rules;
    }
}

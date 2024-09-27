<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Remedios Model
 *
 * @method \App\Model\Entity\Remedio newEmptyEntity()
 * @method \App\Model\Entity\Remedio newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Remedio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Remedio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Remedio findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Remedio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Remedio[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Remedio|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Remedio saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Remedio[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Remedio[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Remedio[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Remedio[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RemediosTable extends Table
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

        $this->setTable('remedios');
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
            ->scalar('quantidade')
            ->maxLength('quantidade', 255)
            ->requirePresence('quantidade', 'create')
            ->notEmptyString('quantidade');

        $validator
            ->scalar('dosagem')
            ->maxLength('dosagem', 255)
            ->requirePresence('dosagem', 'create')
            ->notEmptyString('dosagem');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        $validator
            ->scalar('fabrica')
            ->requirePresence('fabrica', 'create')
            ->notEmptyString('fabrica');

        $validator
            ->decimal('preco')
            ->requirePresence('preco', 'create')
            ->notEmptyString('preco');

        return $validator;
    }
}

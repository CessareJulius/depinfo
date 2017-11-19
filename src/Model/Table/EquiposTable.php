<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Equipos Model
 *
 * @property \App\Model\Table\DetalleRegistroEquiposTable|\Cake\ORM\Association\HasMany $DetalleRegistroEquipos
 *
 * @method \App\Model\Entity\Equipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Equipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Equipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Equipo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Equipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Equipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Equipo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EquiposTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('equipos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('DetalleRegistroEquipos', [
            'foreignKey' => 'equipo_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('serial')
            ->requirePresence('serial', 'create')
            ->notEmpty('serial')
            ->add('serial', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('tipo')
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        $validator
            ->scalar('marca')
            ->requirePresence('marca', 'create')
            ->notEmpty('marca');

        $validator
            ->scalar('modelo')
            ->requirePresence('modelo', 'create')
            ->notEmpty('modelo');

        $validator
            ->scalar('departamento')
            ->requirePresence('departamento', 'create')
            ->notEmpty('departamento');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['serial']));

        return $rules;
    }
}

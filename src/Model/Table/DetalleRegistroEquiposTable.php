<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetalleRegistroEquipos Model
 *
 * @property \App\Model\Table\EquiposTable|\Cake\ORM\Association\BelongsTo $Equipos
 * @property \App\Model\Table\RegistroEquiposTable|\Cake\ORM\Association\BelongsTo $RegistroEquipos
 *
 * @method \App\Model\Entity\DetalleRegistroEquipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\DetalleRegistroEquipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DetalleRegistroEquipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetalleRegistroEquipo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DetalleRegistroEquipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DetalleRegistroEquipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetalleRegistroEquipo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DetalleRegistroEquiposTable extends Table
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

        $this->setTable('detalle_registro_equipos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Equipos', [
            'foreignKey' => 'equipo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RegistroEquipos', [
            'foreignKey' => 'registro_equipos_id',
            'joinType' => 'INNER'
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
            ->scalar('falla')
            ->requirePresence('falla', 'create')
            ->notEmpty('falla');

        $validator
            ->scalar('reparacion')
            ->requirePresence('reparacion', 'create');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['equipo_id'], 'Equipos'));
        $rules->add($rules->existsIn(['registro_equipos_id'], 'RegistroEquipos'));

        return $rules;
    }
}

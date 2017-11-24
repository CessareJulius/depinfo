<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\PersonasTable|\Cake\ORM\Association\BelongsTo $Personas
 * @property \App\Model\Table\TurnosTable|\Cake\ORM\Association\BelongsTo $Turnos
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Personas', [
            'foreignKey' => 'per_id',
            'joinType' => 'INNER'
        ]);
        /*$this->belongsTo('Turnos', [
            'foreignKey' => 'tur_id',
            'joinType' => 'INNER'
        ]);*/
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
            ->scalar('role')
            ->requirePresence('role', 'create')
            ->notEmpty('role');

        $validator
            ->scalar('cargo')
            ->requirePresence('cargo', 'create')
            ->notEmpty('cargo');

        $validator
            ->scalar('usuario')
            ->requirePresence('usuario', 'create')
            ->notEmpty('usuario', 'Rellene este campo');

        $validator
            ->scalar('clave')
            ->requirePresence('clave', 'create')
            ->notEmpty('clave', 'Rellene este campo', 'create');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');
        $validator
            ->notEmpty('per_id')
            ->add('per_id', 'unique', ['rules' => 'validateUnique', 'provider' => 'table', 'message' => 'El empleado ya tiene datos personales guardados']);
        $validator
            ->integer('turno')
            ->requirePresence('turno', 'create')
            ->notEmpty('usuario');

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
        $rules
            ->add($rules->existsIn(['per_id'], 'Personas'))
            ->add($rules->isUnique(['usuario'], 'Ya existe este usuario, intente con uno distinto'));
        //$rules->add($rules->existsIn(['tur_id'], 'Turnos'));

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options) {
        

        $query
            -> find('all', [
                'contain' => [
                    'Personas'
                ],
                'conditions' => [
                    'Users.active' => 1
                ]
            ]);

        return $query;

        //return $query->where(['Users.active' => 1]);
    }
    
    public function recoverPassword($id)
    {
        $user = $this->get($id);
        return $user->clave;
    }

    public function beforeDelete($event, $entity, $options)
    {
        if ($entity->role == 'admin') {
            return false;
        } else {
            return true;
        }
        
    }
}

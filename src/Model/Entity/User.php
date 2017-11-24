<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

/**
 * User Entity
 *
 * @property int $id
 * @property string $role
 * @property string $cargo
 * @property string $usuario
 * @property string $clave
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $per_id
 * @property int $tur_id
 *
 * @property \App\Model\Entity\Persona $persona
 * @property \App\Model\Entity\Turno $turno
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'role' => true,
        'cargo' => true,
        'usuario' => true,
        'clave' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'per_id' => true,
        'turno' => true,
        'persona' => true,
    ];

    protected function _setClave($value) {

        if (!empty($value)) {

            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        } else {

            $id_user = $this->_properties['id'];
            $user = TableRegistry::get('Users')->recoverPassword($id_user);
            return $user;
        }

        
    }
}

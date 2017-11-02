<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

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
        'tur_id' => true,
        'persona' => true,
        'turno' => true
    ];
}

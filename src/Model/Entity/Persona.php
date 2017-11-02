<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Persona Entity
 *
 * @property int $id
 * @property int $cedula
 * @property string $nombre
 * @property string $apellido
 * @property int $telefono
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Persona extends Entity
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
        'cedula' => true,
        'nombre' => true,
        'apellido' => true,
        'telefono' => true,
        'created' => true,
        'modified' => true
    ];
}

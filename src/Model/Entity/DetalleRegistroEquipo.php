<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetalleRegistroEquipo Entity
 *
 * @property int $id
 * @property string $falla
 * @property string $reparacion
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $status
 * @property int $equipo_id
 * @property int $registro_equipos_id
 *
 * @property \App\Model\Entity\Equipo $equipo
 * @property \App\Model\Entity\RegistroEquipo $registro_equipo
 */
class DetalleRegistroEquipo extends Entity
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
        'falla' => true,
        'reparacion' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'equipo_id' => true,
        'registro_equipos_id' => true,
        'equipo' => true,
        'registro_equipo' => true
    ];
}

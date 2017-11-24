<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Equipo Entity
 *
 * @property int $id
 * @property string $serial
 * @property string $tipo
 * @property string $marca
 * @property string $modelo
 * @property string $departamento
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\DetalleRegistroEquipo[] $detalle_registro_equipos
 */
class Equipo extends Entity
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
        'serial' => true,
        'tipo' => true,
        'marca' => true,
        'modelo' => true,
        'departamento' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'detalle_registro_equipos' => true
    ];
}

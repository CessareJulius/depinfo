<?php
use Migrations\AbstractMigration;

class CreateDetalleRegistroEquipos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('detalle_registro_equipos');
        $table->addColumn('falla', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('reparacion', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('status', 'enum', [
            'values' => 'activo, anulado'
        ]);
        $table->create();

        $refTable = $this->table("detalle_registro_equipos");
        $refTable->addColumn("equipo_id", "integer", array("signed" => "disable"))
                 ->addForeignKey("equipo_id", "equipos", "id", array("delete" => "CASCADE", "update" => "NO_ACTION"))
                 ->addColumn("registro_equipos_id", "integer", array("signed" => "disable"))
                 ->addForeignKey("registro_equipos_id", "registro_equipos", "id", array("delete" => "CASCADE", "update" => "NO_ACTION"))
                 ->update();
    }
}

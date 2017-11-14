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
        $table->addColumn('falla', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('reparacion', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();


        $refTable = $this->table("detalle_registro_equipos");
        $refTable->addColumn("equipo_id", "integer", array("signed" => "disable"))
                 ->addForeignKey("equipo_id", "equipos", "id", array("delete" => "CASCADE", "update" => "NO_ACTION"))
                 ->addColumn("registroEquipos_id", "integer", array("signed" => "disable"))
                 ->addForeignKey("registroEquipos_id", "registroEquipos", "id", array("delete" => "CASCADE", "update" => "NO_ACTION"))
                 ->update();

        $table = $this->table('detalle_registro_equipos');
        $table->addColumn('status', 'enum', array('values' => 'activo, anulado'))
              ->update();
    }
}

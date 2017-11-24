<?php
use Migrations\AbstractMigration;

class CreateUsersTable extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('role', 'enum', array('values' => 'admin, user'))
              ->addColumn('cargo', 'string', array('limit' => 100))
              ->addColumn('usuario', 'string', array('limit' => 100))
              ->addColumn('clave', 'string')
              ->addColumn('active', 'boolean')
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();

              $refTable = $this->table("users");
              $refTable->addColumn("per_id", "integer", array("signed" => "disable"))
                       ->addForeignKey("per_id", "personas", "id", array("delete" => "CASCADE", "update" => "NO_ACTION"))
                       ->addColumn("tur_id", "integer", array("signed" => "disable"))
                       ->addForeignKey("tur_id", "turnos", "id", array("delete" => "CASCADE", "update" => "NO_ACTION"))
                       ->update();
    }
}

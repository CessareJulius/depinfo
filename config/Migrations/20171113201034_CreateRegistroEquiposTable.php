<?php
use Migrations\AbstractMigration;

class CreateRegistroEquiposTable extends AbstractMigration
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
        $table = $this->table('registroEquipos');
        $table->addColumn('Codigo', 'string', array('limit' => 100))
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();

              $refTable = $this->table("registroEquipos");
              $refTable->addColumn("persona_id", "integer", array("signed" => "disable"))
                       ->addForeignKey("persona_id", "personas", "id", array("delete" => "CASCADE", "update" => "NO_ACTION"))
                       ->addColumn("user_id", "integer", array("signed" => "disable"))
                       ->addForeignKey("user_id", "users", "id", array("delete" => "CASCADE", "update" => "NO_ACTION"))
                       ->update();
    }
}

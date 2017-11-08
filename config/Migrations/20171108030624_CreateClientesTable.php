<?php
use Migrations\AbstractMigration;

class CreateClientesTable extends AbstractMigration
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
        $Table = $this->table("clientes");
        $Table->addColumn("persona_id", "integer", array("signed" => "disable"))
                 ->addForeignKey("persona_id", "personas", "id", array("delete" => "CASCADE", "update" => "NO_ACTION"))
                 ->create();
    }
}

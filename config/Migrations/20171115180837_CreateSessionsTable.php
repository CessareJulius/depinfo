<?php
use Migrations\AbstractMigration;

class CreateSessionsTable extends AbstractMigration
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
        $table = $this->table('sessions');
        $table->addColumn('status', 'enum', array('values' => 'activa, terminada'))
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();

            $refTable = $this->table("sessions");
            $refTable
                ->addColumn("user_id", "integer", array("signed" => "disable"))
                ->addForeignKey("user_id", "users", "id", array("delete" => "CASCADE", "update" => "NO_ACTION"))
                ->update();
    }
}

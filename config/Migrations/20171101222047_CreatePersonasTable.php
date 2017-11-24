<?php
use Migrations\AbstractMigration;

class CreatePersonasTable extends AbstractMigration
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
        $table = $this->table('personas');
        $table->addColumn('cedula', 'integer')
              ->addColumn('nombre', 'string', array('limit' => 100))
              ->addColumn('apellido', 'string', array('limit' => 100))
              ->addColumn('telefono', 'biginteger')
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();
    }
}

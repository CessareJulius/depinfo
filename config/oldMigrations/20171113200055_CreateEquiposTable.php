<?php
use Migrations\AbstractMigration;

class CreateEquiposTable extends AbstractMigration
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
        $table = $this->table('equipos');
        $table->addColumn('serial', 'string', array('limit' => 100))
              ->addColumn('tipo', 'string', array('limit' => 100))
              ->addColumn('marca', 'string', array('limit' => 100))
              ->addColumn('modelo', 'string', array('limit' => 100))
              ->addColumn('departamento', 'string', array('limit' => 100))
              ->addColumn('status', 'enum', array('values' => 'reparando, reparado, entregado'))
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();
    }
}

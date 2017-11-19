<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetalleRegistroEquiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetalleRegistroEquiposTable Test Case
 */
class DetalleRegistroEquiposTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetalleRegistroEquiposTable
     */
    public $DetalleRegistroEquipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalle_registro_equipos',
        'app.equipos',
        'app.registro_equipos',
        'app.personas',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetalleRegistroEquipos') ? [] : ['className' => DetalleRegistroEquiposTable::class];
        $this->DetalleRegistroEquipos = TableRegistry::get('DetalleRegistroEquipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetalleRegistroEquipos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

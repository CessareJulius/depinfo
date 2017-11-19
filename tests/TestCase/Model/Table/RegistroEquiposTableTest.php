<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegistroEquiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegistroEquiposTable Test Case
 */
class RegistroEquiposTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RegistroEquiposTable
     */
    public $RegistroEquipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('RegistroEquipos') ? [] : ['className' => RegistroEquiposTable::class];
        $this->RegistroEquipos = TableRegistry::get('RegistroEquipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RegistroEquipos);

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

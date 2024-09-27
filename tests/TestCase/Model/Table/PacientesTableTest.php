<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PacientesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PacientesTable Test Case
 */
class PacientesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PacientesTable
     */
    protected $Pacientes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Pacientes',
        'app.Atendimento',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pacientes') ? [] : ['className' => PacientesTable::class];
        $this->Pacientes = $this->getTableLocator()->get('Pacientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Pacientes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PacientesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

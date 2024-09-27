<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AtendimentoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AtendimentoTable Test Case
 */
class AtendimentoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AtendimentoTable
     */
    protected $Atendimento;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Atendimento',
        'app.Medicos',
        'app.Pacientes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Atendimento') ? [] : ['className' => AtendimentoTable::class];
        $this->Atendimento = $this->getTableLocator()->get('Atendimento', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Atendimento);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AtendimentoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AtendimentoTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

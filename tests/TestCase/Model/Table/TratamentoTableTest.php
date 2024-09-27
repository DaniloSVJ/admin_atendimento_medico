<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TratamentoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TratamentoTable Test Case
 */
class TratamentoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TratamentoTable
     */
    protected $Tratamento;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Tratamento',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tratamento') ? [] : ['className' => TratamentoTable::class];
        $this->Tratamento = $this->getTableLocator()->get('Tratamento', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tratamento);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TratamentoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

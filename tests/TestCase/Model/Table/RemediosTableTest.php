<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RemediosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RemediosTable Test Case
 */
class RemediosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RemediosTable
     */
    protected $Remedios;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Remedios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Remedios') ? [] : ['className' => RemediosTable::class];
        $this->Remedios = $this->getTableLocator()->get('Remedios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Remedios);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RemediosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

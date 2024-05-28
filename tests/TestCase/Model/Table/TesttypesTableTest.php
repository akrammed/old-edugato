<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TesttypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TesttypesTable Test Case
 */
class TesttypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TesttypesTable
     */
    protected $Testtypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Testtypes',
        'app.Tests',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Testtypes') ? [] : ['className' => TesttypesTable::class];
        $this->Testtypes = $this->getTableLocator()->get('Testtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Testtypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TesttypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

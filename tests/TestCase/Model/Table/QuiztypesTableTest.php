<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuiztypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuiztypesTable Test Case
 */
class QuiztypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuiztypesTable
     */
    protected $Quiztypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Quiztypes',
        'app.Quizs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Quiztypes') ? [] : ['className' => QuiztypesTable::class];
        $this->Quiztypes = $this->getTableLocator()->get('Quiztypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Quiztypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QuiztypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

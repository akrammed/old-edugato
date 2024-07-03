<?php
declare(strict_types=1);

namespace Quiz\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Quiz\Model\Table\QuiztypesTable;

/**
 * Quiz\Model\Table\QuiztypesTable Test Case
 */
class QuiztypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Quiz\Model\Table\QuiztypesTable
     */
    protected $Quiztypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'plugin.Quiz.Quiztypes',
        'plugin.Quiz.Quizs',
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
     * @uses \Quiz\Model\Table\QuiztypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

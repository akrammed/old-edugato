<?php
declare(strict_types=1);

namespace Quiz\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Quiz\Model\Table\QuizsTable;

/**
 * Quiz\Model\Table\QuizsTable Test Case
 */
class QuizsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Quiz\Model\Table\QuizsTable
     */
    protected $Quizs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'plugin.Quiz.Quizs',
        'plugin.Quiz.Quiztypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Quizs') ? [] : ['className' => QuizsTable::class];
        $this->Quizs = $this->getTableLocator()->get('Quizs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Quizs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \Quiz\Model\Table\QuizsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \Quiz\Model\Table\QuizsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

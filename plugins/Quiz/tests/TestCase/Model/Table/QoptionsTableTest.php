<?php
declare(strict_types=1);

namespace Quiz\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Quiz\Model\Table\QoptionsTable;

/**
 * Quiz\Model\Table\QoptionsTable Test Case
 */
class QoptionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Quiz\Model\Table\QoptionsTable
     */
    protected $Qoptions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'plugin.Quiz.Qoptions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Qoptions') ? [] : ['className' => QoptionsTable::class];
        $this->Qoptions = $this->getTableLocator()->get('Qoptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Qoptions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \Quiz\Model\Table\QoptionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

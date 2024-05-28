<?php
declare(strict_types=1);

namespace Quiz\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Quiz\Model\Table\QquestionsTable;

/**
 * Quiz\Model\Table\QquestionsTable Test Case
 */
class QquestionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Quiz\Model\Table\QquestionsTable
     */
    protected $Qquestions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'plugin.Quiz.Qquestions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Qquestions') ? [] : ['className' => QquestionsTable::class];
        $this->Qquestions = $this->getTableLocator()->get('Qquestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Qquestions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \Quiz\Model\Table\QquestionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

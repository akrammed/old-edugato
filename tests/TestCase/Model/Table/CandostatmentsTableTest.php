<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandostatmentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandostatmentsTable Test Case
 */
class CandostatmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CandostatmentsTable
     */
    protected $Candostatments;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Candostatments',
        'app.Learningpaths',
        'app.Shorts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Candostatments') ? [] : ['className' => CandostatmentsTable::class];
        $this->Candostatments = $this->getTableLocator()->get('Candostatments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Candostatments);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CandostatmentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CandostatmentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

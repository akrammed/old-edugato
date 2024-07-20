<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LearningpathsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LearningpathsTable Test Case
 */
class LearningpathsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LearningpathsTable
     */
    protected $Learningpaths;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Learningpaths',
        'app.Candostatments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Learningpaths') ? [] : ['className' => LearningpathsTable::class];
        $this->Learningpaths = $this->getTableLocator()->get('Learningpaths', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Learningpaths);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LearningpathsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

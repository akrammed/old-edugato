<?php
declare(strict_types=1);

namespace Lms\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Lms\Model\Table\LevelsTable;

/**
 * Lms\Model\Table\LevelsTable Test Case
 */
class LevelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Lms\Model\Table\LevelsTable
     */
    protected $Levels;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'plugin.Lms.Levels',
        'plugin.Lms.Courses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Levels') ? [] : ['className' => LevelsTable::class];
        $this->Levels = $this->getTableLocator()->get('Levels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Levels);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \Lms\Model\Table\LevelsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

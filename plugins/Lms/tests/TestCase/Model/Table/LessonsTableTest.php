<?php
declare(strict_types=1);

namespace Lms\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Lms\Model\Table\LessonsTable;

/**
 * Lms\Model\Table\LessonsTable Test Case
 */
class LessonsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Lms\Model\Table\LessonsTable
     */
    protected $Lessons;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'plugin.Lms.Lessons',
        'plugin.Lms.Chapters',
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
        $config = $this->getTableLocator()->exists('Lessons') ? [] : ['className' => LessonsTable::class];
        $this->Lessons = $this->getTableLocator()->get('Lessons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Lessons);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \Lms\Model\Table\LessonsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \Lms\Model\Table\LessonsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

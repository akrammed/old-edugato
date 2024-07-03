<?php
declare(strict_types=1);

namespace Lms\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Lms\Model\Table\CategorysTable;

/**
 * Lms\Model\Table\CategorysTable Test Case
 */
class CategorysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Lms\Model\Table\CategorysTable
     */
    protected $Categorys;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'plugin.Lms.Categorys',
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
        $config = $this->getTableLocator()->exists('Categorys') ? [] : ['className' => CategorysTable::class];
        $this->Categorys = $this->getTableLocator()->get('Categorys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Categorys);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \Lms\Model\Table\CategorysTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoursesUsersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoursesUsersTable Test Case
 */
class CoursesUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CoursesUsersTable
     */
    protected $CoursesUsers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.CoursesUsers',
        'app.Users',
        'app.Courses',
        'app.Learningpaths',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CoursesUsers') ? [] : ['className' => CoursesUsersTable::class];
        $this->CoursesUsers = $this->getTableLocator()->get('CoursesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CoursesUsers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CoursesUsersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CoursesUsersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

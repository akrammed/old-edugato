<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShortTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShortTypesTable Test Case
 */
class ShortTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShortTypesTable
     */
    protected $ShortTypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.ShortTypes',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('ShortTypes') ? [] : ['className' => ShortTypesTable::class];
        $this->ShortTypes = $this->getTableLocator()->get('ShortTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ShortTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ShortTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ShortTypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

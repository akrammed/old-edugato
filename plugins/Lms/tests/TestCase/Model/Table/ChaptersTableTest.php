<?php
declare(strict_types=1);

namespace Lms\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Lms\Model\Table\ChaptersTable;

/**
 * Lms\Model\Table\ChaptersTable Test Case
 */
class ChaptersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Lms\Model\Table\ChaptersTable
     */
    protected $Chapters;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'plugin.Lms.Chapters',
        'plugin.Lms.Lessons',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Chapters') ? [] : ['className' => ChaptersTable::class];
        $this->Chapters = $this->getTableLocator()->get('Chapters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Chapters);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \Lms\Model\Table\ChaptersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

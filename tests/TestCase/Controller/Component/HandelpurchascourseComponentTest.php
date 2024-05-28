<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\HandelpurchascourseComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\HandelpurchascourseComponent Test Case
 */
class HandelpurchascourseComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\HandelpurchascourseComponent
     */
    protected $Handelpurchascourse;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Handelpurchascourse = new HandelpurchascourseComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Handelpurchascourse);

        parent::tearDown();
    }
}

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\HandelQuizCreateComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\HandelQuizCreateComponent Test Case
 */
class HandelQuizCreateComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\HandelQuizCreateComponent
     */
    protected $HandelQuizCreate;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->HandelQuizCreate = new HandelQuizCreateComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->HandelQuizCreate);

        parent::tearDown();
    }
}

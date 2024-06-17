<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\RequestHandlerComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\RequestHandlerComponent Test Case
 */
class RequestHandlerComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\RequestHandlerComponent
     */
    protected $RequestHandler;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->RequestHandler = new RequestHandlerComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RequestHandler);

        parent::tearDown();
    }
}

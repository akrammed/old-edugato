<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\HandelUploadComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\HandelUploadComponent Test Case
 */
class HandelUploadComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\HandelUploadComponent
     */
    protected $HandelUpload;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->HandelUpload = new HandelUploadComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->HandelUpload);

        parent::tearDown();
    }
}

<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTestCase extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }
}

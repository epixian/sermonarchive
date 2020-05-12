<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_access_admin_mode()
    {
        $this->get('/admin')
            ->assertRedirect('/login');
    }
}

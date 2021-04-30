<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\ApiTestCase;

class UsersTest extends ApiTestCase
{
    /** @test */
    public function guests_cannot_access_admin_mode()
    {
        $this->get('/admin')
            ->assertRedirect('/login');
    }
}

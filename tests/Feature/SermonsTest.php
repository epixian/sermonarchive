<?php

namespace Tests\Feature;

use App\Sermon;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SermonsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_list_sermons()
    {
        $user = factory(User::class)->create();
        $sermon = $user->sermons()->create(factory(Sermon::class)->raw());

        $this->actingAs($user)
            ->get('/admin/sermons')
            ->assertSee($sermon->name);
    }

    /** @test */
    public function a_user_can_show_a_sermon()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $sermon = $user->sermons()->create(factory(Sermon::class)->raw());

        $this->actingAs($user)
            ->get('/admin' . $sermon->path())
            ->assertSee($sermon->name);
    }

    /** @test */
    public function a_user_can_create_a_sermon()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $sermon = factory(Sermon::class)->raw();

        $this->actingAs($user)
            ->post('/admin/sermons', $sermon);

        $this->assertDatabaseHas('sermons', $sermon);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Sermon;
use App\Models\Service;
use App\Models\Speaker;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SermonsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        $this->seed();
    }

    /** @test */
    public function a_guest_can_list_sermons()
    {
        $sermon = Sermon::factory()
            ->for(Service::factory()->create())
            ->for(Speaker::factory()->create())
            ->create();

        $this->get('/sermons')
            ->assertSee($sermon->name);
    }

    /** @test */
    public function a_guest_can_show_a_sermon()
    {
        $sermon = Sermon::factory()
            ->for(Service::factory()->create())
            ->for(Speaker::factory()->create())
            ->create();

        $this->get($sermon->path())
            ->assertSee($sermon->name);
    }

    /** @test */
    public function a_guest_cannot_create_update_or_delete_a_sermon()
    {
        $sermon = Sermon::factory()
            ->for($service = Service::factory()->create())
            ->for(Speaker::factory()->create())
            ->raw();

        $this->post($service->path() . '/sermons', $sermon)
            ->assertRedirect('/login');

        $this->assertDatabaseMissing('sermons', $sermon);
    }

    /** @test */
    public function a_user_can_create_a_sermon()
    {
        $user = User::factory()->create()->givePermissionTo('edit_sermons');
        $sermon = Sermon::factory()
            ->for($service = Service::factory()->create())
            ->for(Speaker::factory()->create())
            ->raw();

        $this->actingAs($user)
            ->post($service->path() . '/sermons', $sermon)
            ->assertRedirect();

        $this->assertDatabaseHas('sermons', ['name' => $sermon['name']]);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Sermon;
use App\Models\Service;
use App\Models\Speaker;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Tests\ApiTestCase;

class SermonsTest extends ApiTestCase
{
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

        $this->post('/admin' . $service->path() . '/sermon', $sermon)
            ->assertRedirect('/login');

        $this->assertDatabaseMissing('sermons', $sermon);
    }

    /** @test */
    public function a_user_can_create_a_sermon()
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere(['name' => 'stream_technician']))
            ->create();

        $service = Service::factory()->create();
        $sermon = Sermon::factory()
            ->for(Speaker::factory()->create())
            ->raw();

        $this->actingAs($user)
            ->post('/admin' . $service->path() . '/sermon', $sermon)
            ->assertRedirect();

        $this->assertDatabaseHas('sermons', ['name' => $sermon['name']]);
    }
}

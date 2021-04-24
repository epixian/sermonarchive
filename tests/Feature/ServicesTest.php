<?php

namespace Tests\Feature;

use App\Models\Sermon;
use App\Models\Service;
use App\Models\Speaker;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Tests\ApiTestCase;

class ServicesTest extends ApiTestCase
{
    /** @test */
    public function guests_and_regular_users_cannot_list_or_view_services()
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'regular_user'))
            ->create();

        $service = Service::factory()
            ->has(Sermon::factory()->for(Speaker::factory()))
            ->create();

        $this->get('/admin/services')
            ->assertRedirect();

        $this->get('/admin' . $service->path())
            ->assertRedirect();

        $this->actingAs($user)
            ->get('/admin/services')
            ->assertForbidden();

        $this->get('/admin' . $service->path())
            ->assertForbidden();
    }

    /** @test */
    public function guests_cannot_create_update_or_delete_services()
    {
        $this->post('/admin/services')
            ->assertRedirect('/login');

        $service = Service::factory()
            ->has(Sermon::factory()->for(Speaker::factory()))
            ->create();

        $this->patch('/admin' . $service->path(), [])
            ->assertRedirect('/login');

        $this->delete('/admin' . $service->path())
            ->assertRedirect('/login');
    }

    /** @test */
    public function regular_users_cannot_create_update_or_delete_services()
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'regular_user'))
            ->create();

        $this->actingAs($user)
            ->post('/admin/services')
            ->assertForbidden();

        $service = Service::factory()
            ->has(Sermon::factory()->for(Speaker::factory()))
            ->create();

        $this->patch('/admin' . $service->path(), [])
            ->assertForbidden();

        $this->delete('/admin' . $service->path())
            ->assertForbidden();
    }

    /** @test */
    public function stream_technicians_can_create_services()
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'stream_technician'))
            ->create();

        $attributes = Service::factory()->raw();

        $response = $this->actingAs($user)
            ->post('/admin/services', $attributes)
            ->assertRedirect();

        $this->followRedirects($response)
            ->assertSee('Add Sermon');
    }

    /** @test */
    public function stream_technicians_can_update_services()
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'stream_technician'))
            ->create();

        $service = Service::factory()
            ->has(Sermon::factory()->for(Speaker::factory()))
            ->create();

        $this->actingAs($user)
            ->patch('/admin' . $service->path(), ['name' => 'asdf service'])
            ->assertRedirect('/admin' . $service->path());
    }
}

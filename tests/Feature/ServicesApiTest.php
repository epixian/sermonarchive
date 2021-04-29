<?php

namespace Tests\Feature;

use App\Models\Breeze;
use App\Models\Sermon;
use App\Models\Service;
use App\Models\Speaker;
use App\Models\User;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Tests\ApiTestCase;

class ServicesApiTest extends ApiTestCase
{
    /** @test */
    public function guests_cannot_list_or_view_services_api()
    {
        $service = Service::factory()->create();

        $this->getJson('/api/services')
            ->assertUnauthorized();

        $this->getJson('/api' . $service->path())
            ->assertUnauthorized();
    }

    /** @test */
    public function regular_users_can_list_and_view_services_api()
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'regular_user'))
            ->create();

        $service = Service::factory()->create();

        $this->actingAs($user)
            ->getJson('/api/services')
            ->assertOk()
            ->assertJsonPath('data.0.name', $service->name);

        $this->actingAs($user)
            ->getJson('/api' . $service->path())
            ->assertOk()
            ->assertJsonPath('data.name', $service->name);
    }

    /** @test */
    public function guests_and_regular_users_cannot_create_services_api()
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'regular_user'))
            ->create();

        $attributes = Service::factory()->raw();

        $this->postJson('/api/services', $attributes)
            ->assertUnauthorized();

        $this->actingAs($user)
            ->postJson('/api/services', $attributes)
            ->assertForbidden();
    }

    /** @test */
    public function guests_and_regular_users_cannot_update_services_api()
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'regular_user'))
            ->create();

        $service = Service::factory()
            ->create();

        $attributes = [
            'service_date' => Carbon::now()->addMinutes(5),
        ];

        $this->patchJson('/api' . $service->path(), $attributes)
            ->assertUnauthorized();

        $this->actingAs($user)
            ->patchJson('/api' . $service->path(), $attributes)
            ->assertForbidden();
    }

    /** @test */
    public function a_stream_technician_can_create_services_api()
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'stream_technician'))
            ->create();

        $attributes = Service::factory([
            'breeze_id' => Breeze::TEST_SERVICE_ID,
            'sermon' => Sermon::factory([
                'speaker_id' => Speaker::factory()->create()->getKey(),
            ])->raw(),
        ])->raw();

        $this->actingAs($user)
            ->postJson('/api/services', $attributes)
            ->assertCreated()
            ->assertJsonPath('data.service_date', $attributes['service_date']);
    }

    /** @test */
    public function a_stream_technician_can_update_services_api()
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'stream_technician'))
            ->create();

        $service = Service::factory()
            ->create();

        $fiveMinutesLater = Carbon::now()->addMinutes(5)->format('H:i:s');

        $attributes = [
            'service_time' => $fiveMinutesLater,
        ];

        $this->actingAs($user)
            ->patchJson('/api' . $service->path(), $attributes)
            ->assertOk()
            ->assertJsonPath('data.service_time', $fiveMinutesLater);
    }
}

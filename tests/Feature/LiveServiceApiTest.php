<?php

namespace Tests\Feature;

use App\Models\Sermon;
use App\Models\Service;
use App\Models\Speaker;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class LiveServiceApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    /** @test */
    public function guests_can_view_live_service_and_livestream_gives_priority_to_sermon_in_progress_api()
    {
        $now = Carbon::now();

        // create a service for right now
        $service1 = Service::factory([
                'service_date' => $now,
            ])
            ->has(Sermon::factory()->inProgress()->for(Speaker::factory()))
            ->create();

        // create a service for 7 hours in the future
        $service2 = Service::factory([
                'service_date' => $now->setTimezone(config('sermonarchive.event_timezone'))->addHours(7),
            ])
            ->has(Sermon::factory()->for(Speaker::factory()))
            ->create();

        // requesting live service should show service 1
        $this->getJson('/api/services/live')
            ->assertOk()
            ->assertJsonPath('data.service_id', $service1->getKey());

        // shift forward two hours to put us within the window of the later service
        Carbon::setTestNow($now->addHours(2));

        // even though we're within the window for the later service (6h), we shouldn't interrupt the earlier service
        $this->getJson('/api/services/live')
            ->assertOk()
            ->assertJsonPath('data.service_id', $service1->getKey());

        // end the earlier service
        $service1->sermon()->update(['stream_ended' => true]);

        // the earlier stream has ended
        $this->getJson('/api/services/live')
            ->assertOk()
            ->assertJsonPath('data.service_id', $service2->getKey());
    }

    /** @test */
    public function guests_and_regular_users_cannot_update_live_service_api()
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'regular_user'))
            ->create();

        $now = Carbon::now();

        Service::factory([
                'service_date' => $now,
            ])
            ->has(Sermon::factory()->inProgress()->for(Speaker::factory()))
            ->create();

        // Should not be able to update
        $this->patchJson('/api/services/live')
            ->assertUnauthorized();

        // Should not be able to update
        $this->actingAs($user)
            ->patchJson('/api/services/live')
            ->assertForbidden();
    }

    /** @test */
    public function stream_technicians_get_management_data_from_live_service_api()
    {
        $serviceDate = Carbon::now()->subMinutes(5);

        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'stream_technician'))
            ->create();

        Sermon::factory([
                'stream_started' => true,
            ])
            ->for(Service::factory(['service_date' => $serviceDate]))
            ->for(Speaker::factory())
            ->create();

        // stream technician should get additional data returned
        $this->actingAs($user)
            ->getJson('/api/services/live')
            ->assertOk()
            ->assertJsonPath('data.sermon.stream_started', true);
    }

    /** @test */
    public function stream_technicians_can_update_live_service_api()
    {
        $this->withoutExceptionHandling();
        $now = Carbon::now();

        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'stream_technician'))
            ->create();

        $service = Service::factory([
                'service_date' => $now,
            ])
            ->has(Sermon::factory()->inProgress()->for(Speaker::factory()))
            ->create();

        // Should be able to update
        $this->actingAs($user)
            ->patchJson('/api/services/live', [
                'stream_ended' => true,
            ])
            ->assertOk();

        $this->assertEquals(false, $service->sermon->is_live);
    }
}

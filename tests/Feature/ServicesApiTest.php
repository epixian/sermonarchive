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

class ServicesApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    /** @test */
    public function a_guest_can_view_the_current_service_api()
    {
        $now = Carbon::now();

        // create a service for right now
        $service1 = Service::factory([
                'service_date' => $now,
            ])
            ->has(Sermon::factory()->for(Speaker::factory()))
            ->create();

        // create a service for 8 hours in the future
        $service2 = Service::factory([
                'service_date' => $now->setTimezone(config('sermonarchive.event_timezone'))->addHours(8),
            ])
            ->has(Sermon::factory()->for(Speaker::factory()))
            ->create();

        // requesting live service should show service 1
        $this->getJson('/api/services/live')
            ->assertOk()
            ->assertJsonPath('data.service_id', $service1->getKey());

        // jumping 3 hours into the future, request should return service 2 (within 6 hours of start)
        Carbon::setTestNow($now->addhours(3));

        $this->getJson('/api/services/live')
            ->assertOk()
            ->assertJsonPath('data.service_id', $service2->getKey());
    }

    /** @test */
    public function a_stream_technician_can_control_the_current_service_api()
    {
        $serviceDate = Carbon::now()->subMinutes(5);

        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'stream_technician'))
            ->create();

        $sermon = Sermon::factory([
                'stream_started' => true,
            ])
            ->for(Service::factory(['service_date' => $serviceDate]))
            ->for(Speaker::factory())
            ->create();

        // stream technician should get additional data returned
        $this->actingAs($user)
            ->getJson('/api/services/live')
            ->assertOk()
            ->assertJsonPath('data.sermon.stream_started', true)
            ->dump()
            ;
    }
}

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

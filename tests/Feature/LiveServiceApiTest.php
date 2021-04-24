<?php

namespace Tests\Feature;

use App\Models\Sermon;
use App\Models\Service;
use App\Models\Speaker;
use App\Models\User;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Tests\ApiTestCase;

class LiveServiceApiTest extends ApiTestCase
{
     /** @test */
    public function everyone_can_view_a_live_service_api()
    {
        $serviceDate = Carbon::now()->subMinutes(5);

        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'stream_technician'))
            ->create();

        $stream_technician = User::factory()
            ->hasAttached(Role::firstWhere('name', 'stream_technician'))
            ->create();

        Sermon::factory()
            ->inProgress()
            ->for(Service::factory(['service_date' => $serviceDate]))
            ->for(Speaker::factory())
            ->create();

        // guests can view
        $this->getJson('/api/services/live')
            ->assertOk()
            ->assertJsonPath('data.sermon.status', 'streaming');

        // regular users can view
        $this->actingAs($user)
            ->getJson('/api/services/live')
            ->assertOk()
            ->assertJsonPath('data.sermon.status', 'streaming');

        // stream technician can view
        $this->actingAs($stream_technician)
            ->getJson('/api/services/live')
            ->assertOk()
            ->assertJsonPath('data.sermon.status', 'streaming');
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

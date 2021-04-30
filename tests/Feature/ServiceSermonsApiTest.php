<?php

namespace Tests\Feature;

use App\Models\Sermon;
use App\Models\Service;
use App\Models\Speaker;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Tests\ApiTestCase;

class ServiceSermonsApiTest extends ApiTestCase
{
    /** @test */
    public function guests_cannot_create_sermons_api()
    {
        $sermon = Sermon::factory()
            ->for($service = Service::factory()->create())
            ->for(Speaker::factory()->create())
            ->raw();

        $this->postJson('/api' . $service->path() . '/sermon', $sermon)
            ->assertUnauthorized();

        $this->assertDatabaseMissing('sermons', $sermon);
    }

    /** @test */
    public function stream_technicians_can_create_sermons_api()
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere(['name' => 'stream_technician']))
            ->create();

        $service = Service::factory()->create();
        $sermon = Sermon::factory()
            ->for(Speaker::factory()->create())
            ->raw();

        $this->actingAs($user)
            ->postJson('/api' . $service->path() . '/sermon', $sermon)
            ->assertCreated();

        $this->assertDatabaseHas('sermons', ['name' => $sermon['name']]);
    }
}

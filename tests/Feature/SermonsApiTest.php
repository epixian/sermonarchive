<?php

namespace Tests\Feature;

use App\Models\Sermon;
use App\Models\Service;
use App\Models\Speaker;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class SermonsApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    /** @test */
    public function a_guest_can_list_sermons_api()
    {
        $sermon = Sermon::factory()
            ->for(Service::factory()->create())
            ->for(Speaker::factory()->create())
            ->create();

        $this->getJson('/api/sermons')
            ->assertOk()
            ->assertJsonPath('data.0.name', $sermon->name);
    }

    /** @test */
    public function a_guest_can_show_a_sermon_api()
    {
        $sermon = Sermon::factory()
            ->for(Service::factory()->create())
            ->for(Speaker::factory()->create())
            ->create();

        $this->getJson('/api' . $sermon->path())
            ->assertOk()
            ->assertJsonPath('data.name', $sermon->name);
    }

    /** @test */
    public function a_guest_cannot_create_update_or_delete_a_sermon()
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
            ->postJson('/api' . $service->path() . '/sermon', $sermon)
            ->assertCreated();

        $this->assertDatabaseHas('sermons', ['name' => $sermon['name']]);
    }
}

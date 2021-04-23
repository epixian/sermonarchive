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
    public function guests_can_list_and_view_sermons_api()
    {
        $sermon = Sermon::factory()
            ->for(Service::factory()->create())
            ->for(Speaker::factory()->create())
            ->create();

        $this->getJson('/api/sermons')
            ->assertOk()
            ->assertJsonPath('data.0.name', $sermon->name);

        $this->getJson('/api' . $sermon->path())
            ->assertOk()
            ->assertJsonPath('data.name', $sermon->name);
    }
}

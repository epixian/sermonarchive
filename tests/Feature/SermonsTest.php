<?php

namespace Tests\Feature;

use App\Sermon;
use App\Service;
use App\Speaker;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SermonsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        $this->seed();
    }

    /** @test */
    public function a_guest_can_list_sermons()
    {
        $service = factory(Service::class)->create();
        $speaker = factory(Speaker::class)->create();
        $sermon = factory(Sermon::class)->create(['service_id' => $service->id, 'speaker_id' => $speaker->id]);

        $this->get('/sermons')
            ->assertSee($sermon->name);
    }

    /** @test */
    public function a_guest_can_show_a_sermon()
    {
        $service = factory(Service::class)->create();
        $speaker = factory(Speaker::class)->create();
        $sermon = factory(Sermon::class)->create(['service_id' => $service->id, 'speaker_id' => $speaker->id]);

        $this->get($sermon->path())
            ->assertSee($sermon->name);
    }

    /** @test */
    public function a_guest_cannot_create_update_or_delete_a_sermon()
    {
        $service = factory(Service::class)->create();
        $speaker = factory(Speaker::class)->create();
        $sermon = factory(Sermon::class)->raw(['service_id' => $service->id, 'speaker_id' => $speaker->id]);

        $this->post($service->path() . '/sermons', $sermon)
            ->assertRedirect('/login');

        $this->assertDatabaseMissing('sermons', $sermon);
    }

    /** @test */
    public function a_user_can_create_a_sermon()
    {
        $user = factory(User::class)->create()->givePermissionTo('edit_services');
        $service = factory(Service::class)->create();
        $speaker = factory(Speaker::class)->create();
        $sermon = factory(Sermon::class)->raw(['service_id' => $service->id, 'speaker_id' => $speaker->id]);

        $this->actingAs($user)
            ->post($service->path() . '/sermons', $sermon);

        $this->assertDatabaseHas('sermons', ['name' => $sermon['name']]);
    }
}

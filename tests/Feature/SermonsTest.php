<?php

namespace Tests\Feature;

use App\Sermon;
use App\Service;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SermonsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_guest_can_list_sermons()
    {
        $service = factory(Service::class)->create();

        $sermon = factory(Sermon::class)->create(['service_id' => $service->id]);

        $this->get('/sermons')
            ->assertSee($sermon->name);
    }

    /** @test */
    public function a_guest_can_show_a_sermon()
    {
        $service = factory(Service::class)->create();

        $sermon = factory(Sermon::class)->create(['service_id' => $service->id]);

        $this->get($sermon->path())
            ->assertSee($sermon->name);
    }

    /** @test */
    public function a_guest_cannot_create_update_or_delete_a_sermon()
    {
        $service = factory(Service::class)->create();

        $sermon = factory(Sermon::class)->raw(['service_id' => $service->id]);



    }

    /** @test */
    public function a_user_can_create_a_sermon()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $service = factory(Service::class)->create();
        $sermon = factory(Sermon::class)->raw(['service_id' => $service->id]);

        $this->actingAs($user)
            ->post('/admin/sermons', $sermon);

        $this->assertDatabaseHas('sermons', $sermon);
    }
}

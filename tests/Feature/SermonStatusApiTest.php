<?php

namespace Tests\Feature;

use App\Models\Sermon;
use App\Models\Service;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Tests\ApiTestCase;

class SermonStatusApiTest extends ApiTestCase
{
    /**
     * Data provider for sermon status updates
     *
     * @return array
     */
    public function statusDataProvider()
    {
        return [
            'streaming' => [[
                ['stream_started' => true],
                'streaming',
            ]],
            'processing' => [[
                ['stream_ended' => true],
                'processing',
            ]],
            'recorded' => [[
                ['recording_done' => true],
                'recorded',
            ]],
        ];
    }

    /**
     * @test
     *
     * @param  array  $data
     * @dataProvider statusDataProvider()
     */
    public function update_a_sermon_status(array $data)
    {
        $user = User::factory()
            ->hasAttached(Role::firstWhere('name', 'stream_technician'))
            ->create();

        $sermon = Sermon::factory()
            ->for(Service::factory())
            ->create();

        $this->actingAs($user)
            ->patchJson('/api' . $sermon->path() . '/status', $data[0])
            ->assertOk()
            ->assertJsonPath('data.status', $data[1]);
    }
}

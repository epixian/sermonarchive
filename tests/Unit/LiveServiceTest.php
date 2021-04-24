<?php

namespace Tests\Unit;

use App\Models\Sermon;
use App\Models\Service;
use App\Models\Speaker;
use Illuminate\Support\Carbon;
use Tests\ApiTestCase;

class LiveServiceTest extends ApiTestCase
{

    /**
     * Simulate a sermon in progress, a future sermon, and a service without a sermon attached.
     * Test should return the sermon in progress (#1).
     *
     * @test
     */
    public function service_with_sermon_in_progress_gets_priority_1()
    {
        $now = Carbon::now();

        // create a service with a sermon in progress
        $service1 = Service::factory([
                'service_date' => $now,
            ])
            ->has(Sermon::factory()->inProgress()->for(Speaker::factory()))
            ->create();

        // create a service with a sermon not in progress
        $service2 = Service::factory([
                'service_date' => $now->copy()->addSecond(),
            ])
            ->has(Sermon::factory()->for(Speaker::factory()))
            ->create();

        // create a service without
        $service3 = Service::factory([
                'service_date' => $now->copy()->addSeconds(2),
            ])
            ->create();

        $this->assertEquals($service1->getKey(), Service::getLiveService()->getKey());
    }

    /**
     * Simulate a completed sermon, a sermon in progress, and a future sermon.
     * Test should return the sermon in progress (#2).
     *
     * @test
     */
    public function service_with_sermon_in_progress_gets_priority_2()
    {
        $now = Carbon::now();

        // create a service with a finished sermon
        $service1 = Service::factory([
                'service_date' => $now,
            ])
            ->has(Sermon::factory()->finished()->for(Speaker::factory()))
            ->create();

        // create a service with a sermon in progress
        $service2 = Service::factory([
                'service_date' => $now->copy()->addSecond(),
            ])
            ->has(Sermon::factory()->inProgress()->for(Speaker::factory()))
            ->create();

        // create a service with a sermon not in progress
        $service3 = Service::factory([
                'service_date' => $now->copy()->addSeconds(2),
            ])
            ->has(Sermon::factory()->for(Speaker::factory()))
            ->create();

        $this->assertEquals($service2->getKey(), Service::getLiveService()->getKey());
    }
}

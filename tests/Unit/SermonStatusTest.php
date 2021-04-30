<?php

namespace Tests\Unit;

use App\Models\Sermon;
use Tests\ApiTestCase;

class SermonStatusTest extends ApiTestCase
{
    /** @test */
    public function sermon_with_recording_done_returns_recorded()
    {
        /** @var Sermon $sermon */
        $sermon = Sermon::factory(['recording_done' => true])->make();

        $this->assertEquals('recorded', $sermon->getStatus());
    }

    /** @test */
    public function sermon_with_stream_ended_returns_processing()
    {
        /** @var Sermon $sermon */
        $sermon = Sermon::factory(['stream_ended' => true])->make();

        $this->assertEquals('processing', $sermon->getStatus());
    }

    /** @test */
    public function sermon_with_stream_started_returns_streaming()
    {
        /** @var Sermon $sermon */
        $sermon = Sermon::factory(['stream_started' => true])->make();

        $this->assertEquals('streaming', $sermon->getStatus());
    }

    /** @test */
    public function sermon_without_stream_started_returns_waiting()
    {
        /** @var Sermon $sermon */
        $sermon = Sermon::factory()->make();

        $this->assertEquals('waiting', $sermon->getStatus());
    }
}

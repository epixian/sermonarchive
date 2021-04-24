<?php

namespace Database\Factories;

use App\Models\Sermon;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SermonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sermon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'publish_date' => Carbon::now(),
            'scheduled_time' => $this->faker->time('H:i'),
            'stream_key' => $this->faker->uuid,
            'stream_started' => false,
            'stream_ended' => false,
            'recording_done' => false,
        ];
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function inProgress()
    {
        return $this->state(function () {
            return [
                'stream_started' => true,
                'stream_ended' => false,
            ];
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function finished()
    {
        return $this->state(function () {
            return [
                'stream_started' => true,
                'stream_ended' => true,
            ];
        });
    }
}

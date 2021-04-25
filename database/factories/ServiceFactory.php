<?php

namespace Database\Factories;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $now = Carbon::now();

        return [
            'name' => 'Morning Worship Services (Online)',
            'description' => '',
            'service_date' => $now->format('Y-m-d'),
            'service_time' => $now->format('H:i:s'),
            'breeze_id' => '',
        ];
    }
}

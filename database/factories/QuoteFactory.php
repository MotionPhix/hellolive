<?php

namespace Database\Factories;

use App\Models\Quote;
use App\Models\Billboard;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
  protected $model = Quote::class;

  public function definition()
  {
    return [
      'billboard_uuid' => Billboard::factory(),
      'name' => $this->faker->name,
      'email' => $this->faker->safeEmail,
      'phone' => '+265' . $this->faker->numberBetween(888000000, 888999999),
      'company' => $this->faker->company,
      'start_date' => $this->faker->dateTimeBetween('+1 week', '+2 months'),
      'duration' => $this->faker->randomElement([1, 3, 6, 12]),
      'message' => $this->faker->paragraph,
    ];
  }
}

<?php

namespace Database\Factories;

use App\Models\Billboard;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
  protected $model = Contact::class;

  public function definition()
  {
    return [
      'first_name' => $this->faker->firstName,
      'last_name' => $this->faker->lastName,
      'email' => $this->faker->safeEmail,
      'phone' => '+265' . $this->faker->numberBetween(888000000, 888999999),
      'company' => $this->faker->optional(0.7)->company, // 70% chance to have a company
      'message' => $this->faker->paragraphs(3, true),
      'billboard_uuid' => $this->faker->optional(0.5)->randomElement(
        Billboard::pluck('uuid')->toArray()
      ), // 50% chance to be associated with a billboard
    ];
  }

  /**
   * Indicate that the contact is interested in a specific billboard.
   */
  public function forBillboard(string $billboardUuid)
  {
    return $this->state(function (array $attributes) use ($billboardUuid) {
      return [
        'billboard_uuid' => $billboardUuid,
      ];
    });
  }

  /**
   * Indicate that the contact is not associated with any billboard.
   */
  public function withoutBillboard()
  {
    return $this->state(function (array $attributes) {
      return [
        'billboard_uuid' => null,
      ];
    });
  }

  /**
   * Indicate that the contact represents a company.
   */
  public function asCompany()
  {
    return $this->state(function (array $attributes) {
      return [
        'company' => $this->faker->company,
      ];
    });
  }

}

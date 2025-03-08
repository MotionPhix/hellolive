<?php

namespace Database\Factories;

use App\Models\Billboard;
use Illuminate\Database\Eloquent\Factories\Factory;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class BillboardFactory extends Factory
{
  protected $model = Billboard::class;

  public function __construct()
  {
    parent::__construct();

    // Add the Picsum provider to Faker
    $this->faker->addProvider(new FakerPicsumImagesProvider($this->faker));
  }

  public function definition(): array
  {
    // Common billboard types
    $types = ['Digital', 'Static', 'LED', 'Backlit'];

    // Cities in Malawi
    $cities = [
      'Lilongwe',
      'Blantyre',
      'Mzuzu',
      'Zomba',
      'Kasungu',
      'Mangochi',
      'Salima'
    ];

    // Common billboard dimensions
    $dimensions = [
      ['width' => 25, 'height' => 5],
      ['width' => 12, 'height' => 6],
      ['width' => 12, 'height' => 4],
      ['width' => 10, 'height' => 8],
      ['width' => 8, 'height' => 3],
      ['width' => 6, 'height' => 3],
      ['width' => 4, 'height' => 3],
    ];

    $city = $this->faker->randomElement($cities);
    $dimension = $this->faker->randomElement($dimensions);

    // Specific locations based on the city
    $locations = [
      'Lilongwe' => [
        'Area 18 Roundabout',
        'City Centre',
        'Area 47 Junction',
        'Gateway Mall',
        'Area 25 Market',
        'Kanengo Industrial Area',
      ],
      'Blantyre' => [
        'Chichiri Shopping Mall',
        'Limbe Market',
        'Ginnery Corner',
        'Clock Tower',
        'Blantyre CBD',
      ],
      'Mzuzu' => [
        'Mzuzu Bus Depot',
        'Shoprite Complex',
        'Katoto Area',
        'Highway Shopping Mall',
      ],
      // Add more locations for other cities...
    ];

    $location = isset($locations[$city])
      ? $this->faker->randomElement($locations[$city])
      : "Main Road, $city";

    // Coordinate ranges for Malawi
    $latitude = $this->faker->latitude(-17.1, -9.3);
    $longitude = $this->faker->longitude(32.7, 35.9);

    return [
      'name' => "Billboard at $location",
      'location' => $location,
      'city' => $city,
      'state' => 'Central Region',
      'country' => 'Malawi',
      'latitude' => $latitude,
      'longitude' => $longitude,
      'dimensions' => $dimension,
      'monthly_rate' => $this->faker->randomElement([
        350000,
        450000,
        550000,
        650000,
        750000,
        850000
      ]),
      'type' => $this->faker->randomElement($types),
      'description' => $this->faker->paragraphs(3, true),
      'status' => $this->faker->randomElement(['available', 'maintenance', 'occupied']),
    ];
  }

  /**
   * Configure the model factory.
   */
  public function configure()
  {
    return $this->afterCreating(function (Billboard $billboard) {
      // Add some default media
      $billboard->addMediaFromUrl($this->faker->imageUrl(1200, 600))
        ->toMediaCollection('billboard_images');

      // Add a few more random images
      $imageCount = rand(2, 4);
      for ($i = 0; $i < $imageCount; $i++) {
        $billboard->addMediaFromUrl($this->faker->imageUrl(1200, 600))
          ->toMediaCollection('billboard_images');
      }
    });
  }

  /**
   * Indicate that the billboard is available.
   */
  public function available()
  {
    return $this->state(function (array $attributes) {
      return [
        'status' => 'available',
      ];
    });
  }

  /**
   * Indicate that the billboard is not available.
   */
  public function unavailable()
  {
    return $this->state(function (array $attributes) {
      return [
        'status' => $this->faker->randomElement(['maintenance', 'occupied']),
      ];
    });
  }

  /**
   * Set the billboard type.
   */
  public function ofType(string $type)
  {
    return $this->state(function (array $attributes) use ($type) {
      return [
        'type' => $type,
      ];
    });
  }
}

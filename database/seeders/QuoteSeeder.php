<?php

namespace Database\Seeders;

use App\Models\Quote;
use App\Models\Billboard;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
  public function run(): void
  {
    // Get all billboard IDs
    $billboardUuids = Billboard::pluck('uuid')->toArray();

    // Create quote requests
    Quote::factory()
      ->count(20)
      ->sequence(fn ($sequence) => [
        'billboard_uuid' => $billboardUuids[array_rand($billboardUuids)],
      ])
      ->create();
  }
}

<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Billboard;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
  public function run(): void
  {
    // Get all billboard UUIDs
    $billboardUuids = Billboard::pluck('uuid')->toArray();

    // Create contacts with billboard associations
    Contact::factory()
      ->count(10)
      ->sequence(fn ($sequence) => [
        'billboard_uuid' => $billboardUuids[array_rand($billboardUuids)],
      ])
      ->create();

    // Create contacts without billboard associations
    Contact::factory()
      ->count(5)
      ->withoutBillboard()
      ->create();

    // Create contacts from companies
    Contact::factory()
      ->count(5)
      ->asCompany()
      ->sequence(fn ($sequence) => [
        'billboard_uuid' => $sequence->index % 2 === 0
          ? $billboardUuids[array_rand($billboardUuids)]
          : null,
      ])
      ->create();
  }
}

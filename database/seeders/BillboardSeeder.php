<?php

namespace Database\Seeders;

use App\Models\Billboard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class BillboardSeeder extends Seeder
{
  public function run(): void
  {
    $this->command->info('Creating billboards...');

    try {
      // Create Digital Billboards
      $this->createBillboards('Digital', 5, true);

      // Create Static Billboards
      $this->createBillboards('Static', 8);

      // Create LED Billboards
      $this->createBillboards('LED', 3, true);

      // Create unavailable billboards
      $this->createBillboards(null, 4, false, true);

      // Create Backlit Billboards
      $this->createBillboards('Backlit', 5);

    } catch (\Exception $e) {
      Log::error('Billboard seeder failed: ' . $e->getMessage());
      $this->command->error('Error: ' . $e->getMessage());

      // Continue with the next billboard if one fails
      if ($this->command->confirm('Would you like to continue with the remaining billboards?')) {
        $this->command->info('Continuing...');
      } else {
        throw $e;
      }
    }
  }

  protected function createBillboards(?string $type, int $count, bool $available = false, bool $unavailable = false)
  {
    $factory = Billboard::factory()->count($count);

    if ($type) {
      $factory = $factory->ofType($type);
    }

    if ($available) {
      $factory = $factory->available();
    }

    if ($unavailable) {
      $factory = $factory->unavailable();
    }

    $billboards = $factory->create();

    $this->command->info("Created {$count} billboards" . ($type ? " of type {$type}" : ''));

    return $billboards;
  }
}

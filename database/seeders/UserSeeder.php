<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
  public function run(): void
  {
    // Create admin user
    User::factory()->create([
      'name' => 'Kingsley Motion',
      'email' => 'aishootsmo@gmail.com',
      'email_verified_at' => now(),
      'password' => bcrypt('password'),
      'remember_token' => Str::random(10),
      'is_admin' => true,
    ]);

    // Create some regular users
    User::factory(5)->create();
  }
}

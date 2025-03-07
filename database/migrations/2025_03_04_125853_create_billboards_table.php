<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('billboards', function (Blueprint $table) {
      $table->id();
      $table->uuid('uuid')->unique();
      $table->string('name');
      $table->string('location');
      $table->string('city');
      $table->string('state')->nullable();
      $table->string('country');
      $table->enum('status', ['available', 'occupied', 'maintenance']);
      $table->text('description')->nullable();
      $table->json('dimensions'); // Store width and height
      $table->decimal('latitude', 10, 8);
      $table->decimal('longitude', 11, 8);
      $table->decimal('monthly_rate', 10, 2);
      $table->string('type')->default('static');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('billboards');
  }
};

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
    Schema::create('quotes', function (Blueprint $table) {
      $table->id();
      $table->uuid('uuid')->unique();
      $table->foreignUuid('billboard_uuid')->references('uuid')->on('billboards')->cascadeOnDelete();
      $table->string('name');
      $table->string('email');
      $table->string('phone');
      $table->string('company')->nullable();
      $table->date('start_date');
      $table->integer('duration');
      $table->text('message')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('quotes');
  }
};

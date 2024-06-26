<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contact_user', function (Blueprint $table) {

      $table->id();

      $table->date('from_date');

      $table->date('to_date')->nullable();

      $table->foreignId('contact_id')->constrained('contacts')->onDelete('cascade');

      $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');

      $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

      $table->timestamps();

    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('contact_user');
  }
};

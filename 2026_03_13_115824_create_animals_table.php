<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('animals', function (Blueprint $table) {
        $table->id();
        $table->string('animal_type');
        $table->string('breed')->nullable();
        $table->date('last_vaccination')->nullable();
        $table->date('next_vaccination')->nullable();
        $table->date('last_deworming')->nullable();
        $table->date('next_deworming')->nullable();
        $table->string('status')->default('Alive');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};

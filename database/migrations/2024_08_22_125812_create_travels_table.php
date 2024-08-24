<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->id();
            $table->string('travel_name')->nullable();
            $table->integer('travel_price')->nullable();
            $table->text('travel_picture')->nullable();
            $table->integer('id_origin')->nullable();
            $table->integer('id_destination')->nullable();
            $table->integer('id_departure')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travels');
    }
};

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
        Schema::create('inimates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('collectinalfacility_id');
            $table->foreign('collectinalfacility_id')->references('id')->on('collectinalfacilities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inimates');
    }
};

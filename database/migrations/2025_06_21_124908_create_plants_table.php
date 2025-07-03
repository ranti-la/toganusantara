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
        // database/migrations/xxxx_create_plants_table.php
    Schema::create('plants', function (Blueprint $table) {
        $table->id();
        $table->string('name_local');
        $table->string('name_latin');
        $table->text('description');
        $table->text('benefits');
        $table->text('usage');
        $table->string('image')->nullable();
        $table->unsignedBigInteger('created_by');
        $table->timestamps();

        $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};

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
        Schema::create('bandings', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->longText('alasan_banding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bandings');
    }
};

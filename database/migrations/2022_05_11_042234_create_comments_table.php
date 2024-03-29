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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('parent_id')->constrained('users')->onDelete('cascade')->nullable()->default(null);
            $table->text('body');
            $table->integer('commentable_id')->constrained('posts')->onDelete('cascade');
            $table->string('commentable_type');
            $table->enum('coin', ['nonactive', 'active']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

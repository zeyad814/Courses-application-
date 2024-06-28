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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('videos');
            $table->string('order');
            $table->text('content');
            $table->foreignId('instructor_id')->constrained('instructors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};

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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('major_id')->constrained('majors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sub_major_id')->constrained('sub_majors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sub_sub_major_id')->nullable()->constrained('sub_sub_majors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->float('price');
            $table->float('discount')->default(0);
            $table->text('description');
            $table->tinyInteger("status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('role',['instructor','mentor']);
            $table->text('bio');
            $table->string('phone');
            $table->float('salary')->nullable();
            $table->foreignId('major_id')->constrained('majors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sub_major_id')->nullable()->constrained('sub_majors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sub_sub_major_id')->nullable()->constrained('sub_sub_majors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->tinyInteger('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instarctors');
    }
};

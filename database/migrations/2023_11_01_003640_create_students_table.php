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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->enum('gender', ['L', 'P']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('religion', 100);
            $table->string('kindergarten');
            $table->text('kindergarten_address');
            $table->text('home_address');
            $table->string('school_distance'); // jarak sekolah
            $table->string('father_name');
            $table->string('father_occupation');
            $table->text('father_address');
            $table->string('father_birth_place');
            $table->date('father_birth_date');
            $table->string('mother_name');
            $table->string('mother_occupation');
            $table->text('mother_address');
            $table->string('mother_birth_place');
            $table->date('mother_birth_date');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

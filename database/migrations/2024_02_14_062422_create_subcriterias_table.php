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
        Schema::create('subcriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->string('name');
            $table->integer('value'); // nilai
            $table->timestamps();


            $table->foreign('parent_id')
                ->references('id')
                ->on('criterias')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcriterias');
    }
};

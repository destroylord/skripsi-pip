<?php

use App\Enum\ActiveEnum;
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
        Schema::create('criterias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('score');
            $table->string('weight')->comment('bobot'); // bobot
            $table->string('type', 10);
            $table->unsignedBigInteger('period_id')->default(1);
            $table->string('is_active', 50)->default(ActiveEnum::ACTIVE->value);

            $table->foreign('period_id')
                ->references('id')
                ->on('periods')
             ->cascadeOnDelete()
             ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterias');
    }
};

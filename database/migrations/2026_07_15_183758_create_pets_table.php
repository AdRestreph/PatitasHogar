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
    Schema::create('pets', function (Blueprint $table) {

        $table->id();

        $table->foreignId('species_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->string('name');

        $table->string('breed');

        $table->integer('age_months');

        $table->enum('size', [
            'small',
            'medium',
            'large'
        ]);

        $table->text('description');

        $table->string('photo')->nullable();

        $table->enum('status', [
            'available',
            'in_process',
            'adopted'
        ])->default('available');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};

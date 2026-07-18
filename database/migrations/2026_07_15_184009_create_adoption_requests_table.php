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
    Schema::create('adoption_requests', function (Blueprint $table) {

        $table->id();

        $table->foreignId('pet_id')
              ->constrained()
              ->cascadeOnDelete();


        $table->foreignId('adopter_id')
              ->constrained('users')
              ->cascadeOnDelete();


        $table->enum('status', [
            'pending',
            'approved',
            'rejected'
        ])->default('pending');


        $table->text('reason');

        $table->string('home_type');

        $table->boolean('has_other_pets')
              ->default(false);


        $table->foreignId('reviewed_by')
              ->nullable()
              ->constrained('users')
              ->nullOnDelete();


        $table->timestamp('reviewed_at')
              ->nullable();


        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoption_requests');
    }
};

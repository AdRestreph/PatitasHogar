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
    Schema::create('follow_ups', function (Blueprint $table) {


        $table->id();


        $table->foreignId('adoption_request_id')
              ->constrained()
              ->cascadeOnDelete();


        $table->foreignId('volunteer_id')
              ->constrained('users')
              ->cascadeOnDelete();


        $table->date('visit_date');


        $table->text('notes');


        $table->enum('pet_condition',[
            'good',
            'needs_attention'
        ]);


        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follow_ups');
    }
};

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
        Schema::create('discipline_test_answers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('count_correct_answers');
            $table->string('question_1');
            $table->boolean('question_1_correct');
            $table->string('question_2');
            $table->boolean('question_2_correct');
            $table->string('question_3');
            $table->boolean('question_3_correct');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discipline_test_answers');
    }
};

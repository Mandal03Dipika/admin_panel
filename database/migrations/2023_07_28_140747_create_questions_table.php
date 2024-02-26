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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('question_text');
            $table->string('a_image');
            $table->string('option_a');
            $table->string('b_image');
            $table->string('option_b');
            $table->string('c_image');
            $table->string('option_c');
            $table->string('d_image');
            $table->string('option_d');
            $table->string('correct_ans');
            $table->bigInteger('subject_id')->default(1);
            $table->bigInteger('weightage_id')->default(1);
            // $table->string('tag')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};

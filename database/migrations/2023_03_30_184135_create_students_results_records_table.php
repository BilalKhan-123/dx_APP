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
        Schema::create('students_results_records', function (Blueprint $table) {


            $table->id();
            $table->bigInteger('std_id');
            $table->string('std_name')->nullable();
            $table->unsignedBigInteger('question_id');
            $table->integer('answer')->default(0);   // 0 = Wrong Answer // 1 = Right Answer // 2 = Skip

            $table->string('correct_answer')->nullable();
            $table->integer('score')->default(0);
            $table->integer('active')->default(true);
            $table->timestamps();
        
            $table->foreign('question_id')->references('id')->on('questions_records');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_results_records');
    }
};

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
        Schema::create('questions_records', function (Blueprint $table) {


            $table->id();
            $table->unsignedBigInteger('added_by');
            $table->integer('subject')->default(0);
            $table->text('question');
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('option4')->nullable();
            $table->string('correct_answer')->nullable();
            $table->integer('score')->default(1);
            $table->integer('active')->default(true);
            $table->timestamps();
            $table->foreign('added_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions_records');
    }
};

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
        Schema::create('subject_records', function (Blueprint $table) {


            $table->id();
            $table->unsignedBigInteger('added_by');
           
           
            $table->string('title')->nullable();
            $table->string('code')->nullable();
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
        Schema::dropIfExists('subject_records');
    }
};

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
        Schema::enableForeignKeyConstraints();
        Schema::create('grades', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('student_id');
            $table->integer('grade');
            $table->integer('weight');
            $table->string('comment',50);
        });

        Schema::table('grades', function (Blueprint $table) {
           $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};

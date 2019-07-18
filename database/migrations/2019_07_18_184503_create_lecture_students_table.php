<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lecture_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->timestamps();

             $table->foreing('student_id')->references('id')->on('students')->onDelete('set null');
             $table->foreing('lecture_id')->references('id')->on('lectures')->onDelete('set null');

       
        });
      
            

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecture_students');
    }
}

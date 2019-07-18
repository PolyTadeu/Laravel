<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('start_time');
            $table->string('end_time');
            $table->unsignedBigInteger('speaker_id')->nullable();
            $table->string('max_capacity');

            $table->timestamps();
        });
        Schema::table('lectures', function (Blueprint $table) {
        $table->foreing('student_id')->references('id')->on('students')->onDelete('set null');
        $table->foreing('speaker_id')->references('id')->on('speakers')->onDelete('set null');
    });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
}

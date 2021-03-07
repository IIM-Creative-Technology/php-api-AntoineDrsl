<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('teacher_id');
            $table->string('name');
            $table->date('start');
            $table->date('end');
            $table->timestamps();

            $table->foreign('classe_id')->references('id')->on('classes');
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign(['classe_id']);
            $table->dropForeign(['teacher_id']);
            $table->dropColumn(['classe_id', 'teacher_id']);
        });
        Schema::dropIfExists('subjects');
    }
}

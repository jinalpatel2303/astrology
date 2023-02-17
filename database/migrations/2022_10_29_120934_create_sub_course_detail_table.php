<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_course_detail', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title1')->nullable();
            $table->string('title2')->nullable();
            $table->text('description')->nullable();
            $table->integer('sub_course_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_course_detail');
    }
};

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
        Schema::create('home_about', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('image1')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('count')->nullable();
            $table->string('count_name')->nullable();
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
        Schema::dropIfExists('home_about');
    }
};

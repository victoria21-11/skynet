<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobopeningsTables extends Migration
{
    public function up()
    {
        Schema::create('jobopenings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('requirements')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('extra')->nullable();
            $table->text('conditions')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('jobopenings');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeriodTypesTables extends Migration
{
    public function up()
    {
        Schema::create('period_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('period_types');
    }
}

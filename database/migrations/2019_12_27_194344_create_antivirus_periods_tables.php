<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAntivirusPeriodsTables extends Migration
{
    public function up()
    {
        Schema::create('antivirus_periods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('period')->default(1);
            $table->unsignedBigInteger('period_type_id');
            $table->unsignedBigInteger('antivirus_id');
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('antivirus_periods');
    }
}

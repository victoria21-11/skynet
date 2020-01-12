<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTariffsTables extends Migration
{
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->integer('period')->default(1);
            $table->unsignedBigInteger('period_type_id');
            $table->unsignedBigInteger('bill_tariff_id')->nullable();
            $table->unsignedBigInteger('tariff_group_id')->nullable();
            $table->decimal('price', 8, 2);
            $table->boolean('rebate')->default(false);
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tariffs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelephonesTables extends Migration
{
    public function up()
    {
        Schema::create('telephones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->decimal('price_urban', 8, 2)->nullable();
            $table->decimal('price_mobile', 8, 2);
            $table->decimal('price_landline', 8, 2);
            $table->integer('min_per_month')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('telephones');
    }
}

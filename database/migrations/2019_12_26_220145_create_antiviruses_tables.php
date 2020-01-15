<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAntivirusesTables extends Migration
{
    public function up()
    {
        Schema::create('antiviruses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('antivirus_type_id');
            $table->text('text')->nullable();
            $table->text('extra')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('antiviruses');
    }
}

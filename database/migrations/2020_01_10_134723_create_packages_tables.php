<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePackagesTables extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('hd_channels_count')->nullable();
            $table->unsignedBigInteger('channels_count')->nullable();
            $table->boolean('extra')->default(false);
            $table->decimal('price', 8, 2)->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
}

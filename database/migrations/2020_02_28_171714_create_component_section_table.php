<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_section', function (Blueprint $table) {
            $table->unsignedBigInteger('component_id');
            $table->unsignedBigInteger('section_id');
            $table->json('params')->nullable();
            $table->integer('order')->default(0);
            $table->string('layout_cell_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_section');
    }
}

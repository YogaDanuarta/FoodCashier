<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterstocks', function (Blueprint $table) {
            $table->id();
            $table->string('nameitem');
            $table->string('descriptionitem');
            $table->string('image');
            $table->string('path');
            $table->bigInteger('price');
            $table->bigInteger('qty');

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
        Schema::dropIfExists('masterstocks');
    }
}

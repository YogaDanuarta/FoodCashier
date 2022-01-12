<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('master_nota');
            $table->string('namecashier');
            $table->bigInteger('subtotal');
            $table->timestamps();
            // $table->foreign('namecashier')->references('name')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_transaction');
    }
}

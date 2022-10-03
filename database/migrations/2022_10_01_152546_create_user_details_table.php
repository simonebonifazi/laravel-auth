<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger();
            $table->string('residence')->nullable();
            $table->string('country', 25)->nullable();
            $table->string('language', 25)->nullable();
            //curare aspetto pagamenti 
            $table->string('paypal')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->reference('id')->on('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
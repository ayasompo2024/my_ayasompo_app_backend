<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsPoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_pools', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string("password");
            $table->integer('is_sended_sms')->default(0);
            $table->integer('is_login')->default(0);
            $table->integer('is_sended_to_circle')->default(0);
            $table->integer('circle_response')->nullable();
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
        Schema::dropIfExists('sms_pools');
    }
}
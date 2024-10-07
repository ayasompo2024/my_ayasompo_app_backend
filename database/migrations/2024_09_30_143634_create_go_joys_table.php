<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoJoysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('go_joys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->string('full_name');
            $table->string('nrc');
            $table->date('dob');
            $table->string('mobile_number');
            $table->string('email');
            $table->string('beneficiary_name');
            $table->string('beneficiary_contact');
            $table->string('tag_name');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('go_joys');
    }
}

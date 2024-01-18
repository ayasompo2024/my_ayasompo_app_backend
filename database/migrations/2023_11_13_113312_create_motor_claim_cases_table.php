<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorClaimCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor_claim_cases', function (Blueprint $table) {
            $table->id();
            $table->string("app_customer_id")->nullable();
            $table->string("claim_channel")->nullable();
            $table->string("vehicle_no")->nullable();
            $table->string("driver_name")->nullable();
            $table->string("contact_fullname")->nullable();
            $table->string("contact_telephone")->nullable();
            $table->string("accident_location")->nullable();
            $table->string("accident_date")->nullable();
            $table->string("accident_time")->nullable();
            $table->text("accident_description")->nullable();
            $table->text("accident_damaged_portion")->nullable();
            $table->string("customer_code")->nullable();
            $table->string("risk_name")->nullable();
            $table->string("product_code")->nullable();
            $table->string("class_code")->nullable();
            $table->string("risk_seq_no")->nullable();
            $table->string("policy_no")->nullable();
            $table->string("customer_type")->nullable();
            $table->text("signature_image")->nullable();
            $table->text("accident_damaged_photos")->nullable();
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
        Schema::dropIfExists('motor_claim_cases');
    }
}




















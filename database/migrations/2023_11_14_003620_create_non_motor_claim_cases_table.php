<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonMotorClaimCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_motor_claim_cases', function (Blueprint $table) {
            $table->id();
            $table->string('app_customer_id')->nullable();
            $table->string('policy_or_risk_name')->nullable();
            $table->string('contact_fullname')->nullable();
            $table->string('contact_telephone')->nullable();
            $table->string('nrc_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('product_type')->nullable();
            $table->string('accident_date')->nullable();
            $table->string('accident_time')->nullable();
            $table->text('accident_description')->nullable();
            $table->text('accident_damaged_photos')->nullable();
            $table->text('signature_image')->nullable();
            $table->string('claim_channel')->nullable();
            $table->timestamps()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('non_motor_claim_cases');
    }
}

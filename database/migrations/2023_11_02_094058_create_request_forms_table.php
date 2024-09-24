<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_forms', function (Blueprint $table) {
            $table->id();
            $table->string('casetypecode')->nullable();
            $table->string('ayasompo_enquirychannels')->nullable();
            $table->string('ayasompo_enquiryproducttype')->nullable();
            $table->string('ayasompo_enquirytypes')->nullable();
            $table->string('ayasompo_accounthandlerlookup')->nullable();

            $table->string('title')->nullable();
            $table->string('ayasompo_remark')->nullable();
            $table->string('ayasompo_vehicleno')->nullable();
            $table->string('customerid_contact')->nullable();
            $table->string('ayasompo_customercode')->nullable();
            $table->string('ayasompo_policyno')->nullable();
            $table->string('ayasompo_productcode')->nullable();
            $table->string('ayasompo_classcode')->nullable();
            $table->string('ayasompo_risksequenceno')->nullable();

            $table->string('ayasompo_caseid')->nullable();
            $table->string('ayasompo_inquirydatetime')->nullable();
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
        Schema::dropIfExists('request_forms');
    }
}

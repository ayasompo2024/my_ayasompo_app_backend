<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoreCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_customers', function (Blueprint $table) {
            $table->id();
            $table->string("app_customer_id");
            $table->string("customer_code");
            $table->string("customer_type");
            $table->string("customer_name");
            $table->string("customer_phoneno");
            $table->string("customer_nrc");
            $table->string("email")->nullable();
            $table->string("adddress")->nullable();
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
        Schema::dropIfExists('core_customers');
    }
}




<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_infos', function (Blueprint $table) {
            $table->id();
            $table->integer("customer_id");
            $table->string("agent_name")->nullable();
            $table->string("license_no")->nullable();
            $table->string("agent_type")->nullable();
            $table->string("expired_date")->nullable();
            $table->string("email")->nullable();
            $table->string("achievement")->nullable();
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
        Schema::dropIfExists('agent_infos');
    }
}

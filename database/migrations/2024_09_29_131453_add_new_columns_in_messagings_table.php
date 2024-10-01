<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsInMessagingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messagings', function (Blueprint $table) {
            $table->string('status')->after('noti_for');
            $table->longText('device_token')->after('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messagings', function (Blueprint $table) {
            $table->string('status')->after('noti_for');
            $table->longText('device_token')->after('customer_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentNotisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_notis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->string('title');
            $table->text('message');
            $table->enum('type', ['sales_target', 'renewal', 'campaign_promotion', 'customer_birthday']);
            $table->text('image')->nullable();
            $table->integer('is_read')->default(0);
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
        Schema::dropIfExists('agent_notis');
    }
}

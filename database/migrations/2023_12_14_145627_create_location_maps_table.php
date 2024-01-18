<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_maps', function (Blueprint $table) {
            $table->id();
            $table->string("location_map_category_id");
            $table->string("image")->nullable();
            $table->string("name");
            $table->string("phone");
            $table->string("open_days");
            $table->string("open_hour");
            $table->string("close_hour");
            $table->string("address");
            $table->string("latitude");
            $table->string("longitude");
            $table->text("google_map")->nullable();
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
        Schema::dropIfExists('location_maps');
    }
}











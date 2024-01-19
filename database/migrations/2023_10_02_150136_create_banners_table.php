<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();

            $table->string("tilte")->nullable();
            $table->text("desc")->nullable();
            $table->string("image");
            $table->string("link")->nullable();
            $table->tinyInteger("sort")->default(1);
            $table->string("status")->default(1)->comment("1 Active,0 Close");

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
        Schema::dropIfExists('banners');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalAccessListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_access_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('access_id', 100)->unique();
            $table->timestamp('expires_at');
            $table->text('scopes')->nullable();
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
        Schema::dropIfExists('internal_access_lists');
    }
}

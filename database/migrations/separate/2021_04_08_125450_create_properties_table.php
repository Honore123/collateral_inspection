<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('area')->nullable();
            $table->string('acc_b')->nullable();
            $table->string('foundation')->nullable();
            $table->string('elevation')->nullable();
            $table->string('roof')->nullable();
            $table->string('pavement')->nullable();
            $table->string('ceiling')->nullable();
            $table->string('door_win')->nullable();
            $table->string('finish1')->nullable();
            $table->string('finish2')->nullable();
            $table->string('fence_len')->nullable();
            $table->string('gate')->nullable();
            $table->string('s_water')->nullable();
            $table->string('s_gas')->nullable();
            $table->string('s_elect')->nullable();
            $table->string('s_internet')->nullable();
            $table->string('picture')->nullable();
            $table->string('value')->nullable();
            $table->string('earthId')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}

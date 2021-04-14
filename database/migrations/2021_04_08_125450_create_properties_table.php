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
            $table->string('buildingType');
            $table->string('builtUpArea')->nullable();
            $table->string('accommodation')->nullable();
            $table->string('foundation')->nullable();
            $table->string('elevation')->nullable();
            $table->string('roof')->nullable();
            $table->string('pavement')->nullable();
            $table->string('ceiling')->nullable();
            $table->string('doorAndWindows')->nullable();
            $table->string('internal')->nullable();
            $table->string('external')->nullable();
            $table->string('fenceLength')->nullable();
            $table->string('securedByGate')->nullable();
            $table->json('serviceAttached')->nullable();
            $table->string('otherAttachedServices')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('earth_id')->constrained();
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

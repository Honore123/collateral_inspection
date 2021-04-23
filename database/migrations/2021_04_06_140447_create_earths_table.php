<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inspectionDate');
            $table->string('propertyUPI');
            $table->string('province');
            $table->string('district');
            $table->string('sector');
            $table->string('cell');
            $table->string('village');
            $table->string('propertyOwner');
            $table->string('tenureType');
            $table->string('propertyType');
            $table->string('plotSize');
            $table->string('encumbranes');
            $table->string('mortgaged');
            $table->string('servedBy')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('accuracy');
            $table->string('status')->default(0);
            $table->string('map')->nullable();
            $table->integer('value')->nullable();
            $table->foreignId('users_id')->constrained();
            $table->string('reportFile')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('earths');
    }
}

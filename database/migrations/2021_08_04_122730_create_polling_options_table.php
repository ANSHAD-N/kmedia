<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollingOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polling_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('option');
            $table->unsignedBigInteger('vote')->default(0)->nullable();
            $table->bigInteger('polling_id')->unsigned();
            $table->foreign('polling_id')->references('id')->on('polling')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('polling_options', function (Blueprint $table) {
            //
        });
    }
}

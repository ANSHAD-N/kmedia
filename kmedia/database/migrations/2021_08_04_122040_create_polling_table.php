<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polling', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->boolean('is_active')->default(0)->nullable();
            $table->bigInteger('content_id')->unsigned();
            $table->foreign('content_id')->references('id')->on('content')
            ->onDelete('cascade');
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
        Schema::table('polling', function (Blueprint $table) {
            //
        });
    }
}

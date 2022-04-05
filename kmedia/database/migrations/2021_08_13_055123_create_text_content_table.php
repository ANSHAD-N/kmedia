<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content_title')->nullable();
            $table->mediumText('content_text');
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
        Schema::dropIfExists('text_content');
    }
}

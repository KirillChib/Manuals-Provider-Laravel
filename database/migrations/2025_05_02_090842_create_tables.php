<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manuals', function (Blueprint $table) {
            $table->id();
            $table->string('manualName')->unique();
            $table->string('description');
            $table->string('filePath');
            $table->timestamps();
        });

        Schema::create('claims', function(Blueprint $table){
            $table->id();
            $table->bigInteger('manualId')->unsigned();
            $table->foreign('manualId')->references('id')->on('manuals')->onDelete('cascade');
            $table->string('author');
            $table->string('content');
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
        Schema::dropIfExists('manuals');
        Schema::dropIfExists('claims');
    }
}

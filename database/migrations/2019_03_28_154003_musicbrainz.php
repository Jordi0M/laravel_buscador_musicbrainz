<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Musicbrainz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name')->nulleable();
            $table->string('country')->nulleable();
            $table->string('type')->nulleable();
            $table->string('begin')->nulleable();
            $table->string('ended')->nulleable();
            $table->timestamps();

        });

        Schema::create('recordings', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('title')->nulleable();
            $table->string('length')->nulleable();
            $table->string('disc')->nulleable();
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
        Schema::dropIfExists('artists');
        Schema::dropIfExists('recordings');
    }
}

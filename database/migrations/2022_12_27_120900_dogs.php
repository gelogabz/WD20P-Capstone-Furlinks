<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('age');
            $table->unsignedBigInteger('breed_id1');
            $table->foreign('breed_id1')->references('id')->on('breed')->onDelete('cascade');
            $table->unsignedBigInteger('breed_id2');
            $table->foreign('breed_id2')->references('id')->on('breed')->onDelete('cascade');
            $table->string('pic');
            $table->string('size');
            $table->string('color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

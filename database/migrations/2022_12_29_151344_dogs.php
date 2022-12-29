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
            $table->string('age');
            $table->unsignedBigInteger('breed_id1');
            $table->foreign('breed_id1')->references('id')->on('breed')->onDelete('cascade');
            $table->unsignedBigInteger('breed_id2');
            $table->foreign('breed_id2')->references('id')->on('breed')->onDelete('cascade');
            $table->string('pic');
            $table->string('size');
            $table->string('color');
            $table->string('name')->nullable($value = true);
            $table->string('location');
            $table->boolean('neutered');
            $table->date('birthdate')->nullable($value = true);
            $table->boolean('rescued');
            $table->date('rescuedate')->nullable($value = true);
            $table->smallInteger('fee');
            $table->string('feenotes');
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

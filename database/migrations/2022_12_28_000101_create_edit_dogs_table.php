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
        Schema::create('edit_dogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('breed_id');
            $table->string('gender');
            $table->string('age');
            $table->date('date_born');
            $table->date('date_rescued');
            $table->string('breed_of_sire');
            $table->string('breed_of_dam');
            $table->string('vaccinated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edit_dogs');
    }
};

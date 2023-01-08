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
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->string('profile_pic');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile_no');
            $table->string('about');
            $table->string('gender');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('province');
            $table->string('hometype');
            $table->string('funds');
            $table->boolean('allowed');
            $table->boolean('withpets');
            $table->boolean('allergy');
            $table->boolean('allvaxed');
            $table->boolean('allneut');
            $table->boolean('euthanized');
            $table->boolean('lostpet');
            $table->tinyInteger('cats');
            $table->tinyInteger('dogs');
            $table->string('priresp');
            $table->string('finresp');
            $table->boolean('lefthome');
            $table->integer('hours');
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

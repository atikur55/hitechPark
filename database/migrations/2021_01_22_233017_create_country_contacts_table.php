<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('country_one')->nullable();
            $table->string('country_two')->nullable();
            $table->string('country_three')->nullable();
            $table->string('country_four')->nullable();
            $table->string('button')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('country_contacts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->string('short_heading')->nullable();
            $table->string('button')->nullable();
            $table->string('case_head')->nullable();
            $table->string('ca_one_title')->nullable();
            $table->string('ca_one_btn')->nullable();
            $table->string('ca_two_title')->nullable();
            $table->string('ca_two_btn')->nullable();
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
        Schema::dropIfExists('descriptions');
    }
}

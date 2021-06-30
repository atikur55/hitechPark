<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('website')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->longText('notes')->nullable();
            $table->string('address')->nullable();
            $table->string('date')->nullable();
            $table->string('priority')->nullable();
            $table->string('file')->nullable();
            $table->string('first_image')->default('Bangladesh TechnoSity Ltd.png');
            $table->string('second_image')->default('index.png');
            $table->string('pdf_file')->default('BTL---Bangabandhu Hi-Tech City; Block-III.pdf');
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
        Schema::dropIfExists('enquiries');
    }
}

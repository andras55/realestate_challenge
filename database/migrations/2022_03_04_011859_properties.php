<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Properties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->enum('real_estate_type', ['house', 'departament', 'land', 'commercial_ground']);
            $table->string('street', 128);
            $table->string('external_number', 12);
            $table->string('internal_number', 12)->nullable();
            $table->string('neighborhood', 128);
            $table->string('city', 64);
            $table->string('country', 2);
            $table->integer('rooms');
            $table->decimal('bathrooms', 2, 1);
            $table->string('comments', 128)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}

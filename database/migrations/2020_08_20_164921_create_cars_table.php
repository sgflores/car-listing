<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('model_id');
            $table->unsignedInteger('make_id');
            $table->integer('year');
            $table->decimal('price');
            $table->text('description')->nullable();
            $table->text('photo')->nullable();
            $table->timestamps();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('model_id')->references('id')->on('repositories');
            $table->foreign('make_id')->references('id')->on('repositories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}

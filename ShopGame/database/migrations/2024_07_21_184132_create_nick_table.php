<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNickTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nick', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('attribute',255)->nullable();
            $table->integer('category_id');
            $table->string('price',50);
            $table->integer('status');
    $table->text('description');
            $table->string('image',200);
            $table->integer('ms');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nick');
    }
}

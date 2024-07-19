<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'categories', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'title', 255 );
            $table->string( 'slug', 255 );
            $table->string( 'description', 255 );
            $table->string( 'image', 255 );
            $table->integer( 'status' );
            $table->integer( 'order_category')->nullable();
        } );
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
}

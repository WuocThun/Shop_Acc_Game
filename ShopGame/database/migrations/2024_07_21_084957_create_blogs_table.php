<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'blogs', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'slug', 255 );
            $table->string( 'title', 255 );
            $table->mediumText( 'description' );
            $table->string( 'image', 200 );
            $table->longText( 'content' );
            $table->integer( 'status' );
            $table->date('dateposted');
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {}

}


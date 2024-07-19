<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class IndexController extends Controller {

    public function home() {
        $category = Category::orderBy( 'id', 'desc' )->get();

        return view( 'pages.home', compact( 'category' ) );
    }

    public function dichvu() {
        return view( 'pages.services' );
    }

    public function dichvucon( $slug ) {
        return view( 'pages.sub_services', compact( 'slug' ) );
    }

    public function danhmuc( $slug ) {
        return view( 'pages.category' );
    }
        public function danhmuccon( $slug ) {
            return view( 'pages.sub_category', compact( 'slug' ));

        }
}

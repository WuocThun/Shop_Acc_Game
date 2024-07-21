<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;

class IndexController extends Controller {

    public function home() {
        $slider   = Slider::orderBy( 'id', 'desc' )->where( 'status', 1 )
                          ->get();
        $category = Category::orderBy( 'id', 'desc' )->get();

        return view( 'pages.home', compact( 'category', 'slider' ) );
    }

    public function dichvu() {
        $slider = Slider::orderBy( 'id', 'desc' )->where( 'status', 1 )->get();

        return view( 'pages.services', compact( 'slider' ) );
    }

    public function dichvucon( $slug ) {
        $slider = Slider::orderBy( 'id', 'desc' )->where( 'status', 1 )->get();

        return view( 'pages.sub_services', compact( 'slug', 'slider' ) );
    }

    public function danhmuc( $slug ) {
        $slider = Slider::orderBy( 'id', 'desc' )->where( 'status', 1 )->get();

        return view( 'pages.category', compact( 'slug', 'slider' ) );
    }

    public function danhmuccon( $slug ) {
        $slider = Slider::orderBy( 'id', 'desc' )->where( 'status', 1 )->get();

        return view( 'pages.sub_category', compact( 'slug', 'slider' ) );
    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class  CategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $category = Category::orderBy( 'id', 'desc' )->get();

        return view( 'admin.category.index', compact( 'category' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.category.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $data = $request->validate(
            [
                'title'       => 'required|unique:categories|max:255',
                'description' => 'required|max:255',
                'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status'      => 'required',
            ],
            ['title.unique'=>'Tên danh mục đã có',
                'title.required'=> 'Tên danh mục phải có',
                'description.required'=> 'Mô tả đã tồn tại, hãy nhập mô tả',
                'image.required'=> 'Phải có hình ảnh'

        ]
        );
        $data                  = $request->all();
        $category              = new Category();
        $category->image       = '1.jpg';
        $category->title       = $data['title'];
        $category->description = $data['description'];
        $category->status      = $data['status'];
        $get_image             = $request->image;
        $path                  = 'uploads/category/';
        $get_name_image        = $get_image->getClientOriginalName();
        $name_image            = current( explode( '.', $get_name_image ) );
        $new_image             = $name_image . rand( 0, 99 ) . '.'
                                 . $get_image->getClientOriginalExtension();
        $get_image->move( $path, $new_image );
        $category->image = $new_image;
        $category->save();
        return redirect()->route('category.index')->with('status','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {
        $category = Category::find( $id );

        return view( 'admin.category.edit', compact( 'category' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        $data = $request->validate(
            [
                'title'       => 'required|unique:categories|max:255',
                'description' => 'required|max:255',
                'status'      => 'required',
            ],
            ['title.unique'=>'Tên danh mục đã có',
             'title.required'=> 'Tên danh mục phải có',
             'description.required'=> 'Mô tả đã tồn tại, hãy nhập mô tả',

            ]
        );
        $data                  = $request->all();
        $category              = Category::find( $id );
        $category->image       = '1.jpg';
        $category->title       = $data['title'];
        $category->description = $data['description'];
        $category->status      = $data['status'];
        $get_image             = $request->image;
        if ( $get_image ) {
            $path_unlink = 'uploads/category/' . $category->image;
            if ( file_exists( $path_unlink ) ) {
                unlink( $path_unlink );
            }
            $path           = 'uploads/category/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image     = current( explode( '.', $get_name_image ) );
            $new_image      = $name_image . rand( 0, 99 ) . '.'
                              . $get_image->getClientOriginalExtension();
            $get_image->move( $path, $new_image );
            $category->image = $new_image;
        }
        $category->save();

        return redirect()->back()->with('status','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $category    = Category::find( $id );
        $path_unlink = 'uploads/category/' . $category->image;
        if ( file_exists( $path_unlink ) ) {
            unlink( $path_unlink );
        }
        $category->delete();

        return redirect()->back();
    }

}

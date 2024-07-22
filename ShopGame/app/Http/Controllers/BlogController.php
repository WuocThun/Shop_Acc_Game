<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

use Carbon\Carbon;

class BlogController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $blog = Blog::orderBy( 'id', 'desc' )->paginate( 5 );

        return view( 'admin.blog.index', compact( 'blog' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.blog.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $data              = $request->validate(
            [
                'title'       => 'required|unique:categories|max:255',
                'description' => 'required|max:255',
                'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status'      => 'required',
            ],
            [
                'title.unique'         => 'Tên danh mục đã có',
                'title.required'       => 'Tên danh mục phải có',
                'description.required' => 'Mô tả đã tồn tại, hãy nhập mô tả',
                'image.required'       => 'Phải có hình ảnh',

            ]
        );
        $data              = $request->all();
        $blog              = new Blog();
        $blog->title       = $data['title'];
        $blog->description = $data['description'];
        $blog->status      = $data['status'];
        $blog->slug        = $data['slug'];
        $blog->dateposted   = Carbon::now();
        $blog->content     = $data['content'];
        $get_image         = $request->image;
        $path              = 'uploads/blog/';
        $get_name_image    = $get_image->getClientOriginalName();
        $name_image        = current( explode( '.', $get_name_image ) );
        $new_image         = $name_image . rand( 0, 99 ) . '.'
                             . $get_image->getClientOriginalExtension();
        $get_image->move( $path, $new_image );
        $blog->image = $new_image;
        $blog->save();

        return redirect()->route( 'blog.index' )
                         ->with( 'status', 'Thêm thành công' );
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
        $blog = blog::find( $id );

        return view( 'admin.blog.edit', compact( 'blog' ) );
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
        $data              = $request->validate(
            [
                'title'       => 'required|max:255',
                'description' => 'required|max:255',
                'status'      => 'required',
            ],
            [
                'title.required'       => 'Tên danh mục phải có',
                'description.required' => 'Mô tả đã tồn tại, hãy nhập mô tả',

            ]
        );
        $data              = $request->all();
        $blog              = blog::find( $id );
        $blog->title       = $data['title'];
        $blog->slug        = $data['slug'];
        $blog->description = $data['description'];
        $blog->status      = $data['status'];

        $blog->content = $data['content'];
        $get_image     = $request->image;
        if ( $get_image ) {
            $path_unlink = 'uploads/blog/' . $blog->image;
            if ( file_exists( $path_unlink ) ) {
                unlink( $path_unlink );
            }
            $path           = 'uploads/blog/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image     = current( explode( '.', $get_name_image ) );
            $new_image      = $name_image . rand( 0, 99 ) . '.'
                              . $get_image->getClientOriginalExtension();
            $get_image->move( $path, $new_image );
            $blog->image = $new_image;
        }
        $blog->save();

        return redirect()->back()->with( 'status', 'Cập nhật thành công' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $blog        = blog::find( $id );
        $path_unlink = 'uploads/blog/' . $blog->image;
        if ( file_exists( $path_unlink ) ) {
            unlink( $path_unlink );
        }
        $blog->delete();

        return redirect()->back();
    }

}

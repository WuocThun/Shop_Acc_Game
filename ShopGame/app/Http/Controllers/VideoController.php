<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::orderBy('id', 'desc')->paginate(5);
        return view('admin.video.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $video              = new Video();
        $video->title       = $data['title'];
        $video->link       = $data['link'];
        $video->description = $data['description'];
        $video->status      = $data['status'];
        $video->slug        = $data['slug'];
        $get_image         = $request->image;
        $path              = 'uploads/video/';
        $get_name_image    = $get_image->getClientOriginalName();
        $name_image        = current( explode( '.', $get_name_image ) );
        $new_image         = $name_image . rand( 0, 99 ) . '.'
                             . $get_image->getClientOriginalExtension();
        $get_image->move( $path, $new_image );
        $video->image = $new_image;
        $video->save();

        return redirect()->route( 'video.index' )
                         ->with( 'status', 'Thêm thành công' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find( $id );

        return view( 'admin.video.edit', compact( 'video' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        $video              = video::find( $id );
        $video->title       = $data['title'];
        $video->link       = $data['link'];
        $video->description = $data['description'];
        $video->status      = $data['status'];
        $video->slug        = $data['slug'];

        $get_image     = $request->image;
        if ( $get_image ) {
            $path_unlink = 'uploads/video/' . $video->image;
            if ( file_exists( $path_unlink ) ) {
                unlink( $path_unlink );
            }
            $path           = 'uploads/video/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image     = current( explode( '.', $get_name_image ) );
            $new_image      = $name_image . rand( 0, 99 ) . '.'
                              . $get_image->getClientOriginalExtension();
            $get_image->move( $path, $new_image );
            $video->image = $new_image;
        }
        $video->save();

        return redirect()->back()->with( 'status', 'Cập nhật thành công' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id)->delete();
        return redirect()->back();
    }
}

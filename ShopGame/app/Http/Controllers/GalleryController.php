<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nick;
use App\Models\Gallery;

class GalleryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $get_image = $request->image;
        $nick_id   = $request->nick_id;
        $nick      = Nick::find($nick_id);
        if ($get_image) {
            foreach ($get_image as $key => $img) {
                $path           = 'uploads/gallery/';
                $get_name_image = $img->getClientOriginalName();
                $name_image     = current(explode('.', $get_name_image));
                $new_image      = $name_image . rand(0, 99) . '.'
                                  . $img->getClientOriginalExtension();
                $img->move($path, $new_image);
                $gallery          = new Gallery();
                $gallery->title   = $nick->title;
                $gallery->nick_id = $nick->id;
                $gallery->image   = $new_image;
                $gallery->save();
            }
        }
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
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
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_galary = Gallery::where('nick_id', $id)->get();

        return view('admin.gallery.create', compact('all_galary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery        = Gallery::find( $id );
        $path_unlink = 'uploads/gallery/' . $gallery->image;
        if ( file_exists( $path_unlink ) ) {
            unlink( $path_unlink );
        }
        $gallery->delete();

        return redirect()->back();
    }

}

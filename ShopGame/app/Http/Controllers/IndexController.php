<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Slider;
use App\Models\Video;
use App\Models\Nick;
use App\Models\Gallery;
class IndexController extends Controller
{

    public function home()
    {
        $slider   = Slider::orderBy('id', 'desc')->where('status', 1)->get();
        $category = Category::orderBy('id', 'desc')->get();

        return view('pages.home', compact('category', 'slider'));
    }

    public function dichvu()
    {
        $slider = Slider::orderBy('id', 'desc')->where('status', 1)->get();

        return view('pages.services', compact('slider'));
    }

    public function dichvucon($slug)
    {
        $slider = Slider::orderBy('id', 'desc')->where('status', 1)->get();

        return view('pages.sub_services', compact('slug', 'slider'));
    }

    public function danhmucgame($slug)
    {
        $slider   = Slider::orderBy('id', 'desc')->where('status', 1)->get();
        $category = Category::where('slug', $slug)->first();

        return view('pages.category', compact('slug', 'slider', 'category'));
    }

    public function acc($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $nick     = Nick::where('category_id', $category->id)
                        ->where('status', 1)->paginate(16);
        $slider   = Slider::orderBy('id', 'desc')->where('status', 1)->get();

        return view('pages.acc', compact('slug', 'slider', 'nick', 'category'));
    }

    public function blogs()
    {
        $blog = Blog::orderBy('id', 'desc')->paginate(10);
        //        $blog_huongdan   = Blog::orderBy( 'id', 'desc' )->where( 'kind_of_blog', 'huongdan' )->get();
        $slider = Slider::orderBy('id', 'desc')->where('status', 1)->get();

        return view('pages.blog', compact('slider', 'blog'
        //            ,'blog_huongdan'
        ));
    }

    public function accms($ms)
    {
        $slider   = Slider::orderBy('id', 'desc')->where('status', 1)->get();
        $nick = Nick::where('ms', $ms)->first();
        $gallery = Gallery::where('nick_id',$nick->id)->orderBy('id','desc')->get();

        $nick_game = Nick::find($nick->id);
        $category = Category::where('id',$nick->category_id)->first();
        return view('pages.accms', compact( 'slider', 'nick','category','gallery'));
    }

    public function video_hightlight()
    {
        $slider   = Slider::orderBy('id', 'desc')->where('status', 1)
                          ->get();
        $category = Category::orderBy('id', 'desc')->get();
        $video    = Video::orderBy('id', 'desc')->where('status', 1)
                         ->paginate(5);

        return view('pages.video', compact('category', 'slider', 'video'));
    }

    public function blog_detail($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        //        $blog_huongdan   = Blog::orderBy( 'id', 'desc' )->where( 'kind_of_blog', 'huongdan' )->get();
        $slider = Slider::orderBy('id', 'desc')->where('status', 1)->get();

        return view('pages.blog_details', compact('slider', 'blog'));
    }

    public function show_video(Request $request)
    {
        $data                        = $request->all();
        $video                       = Video::find($data['id']);
        $output['video_title']       = $video->title;
        $output['video_description'] = $video->description;
        $output['video_link']        = $video->link;
        echo json_encode($output);

    }

}

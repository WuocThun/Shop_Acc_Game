@extends('layout')
@section('content')
    <div class="c-layout-page">
        <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-sbold"><a href="/blog" title="Blog tin tức">Blog tin tức</a></h3>
                </div>
                <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                    <li><a href="/">Trang chủ</a></li>
                    <li>/</li>
                    <li>
                        <a href="/blog">
                            <h1>Blog tin tức</h1>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="c-content-box c-size-md">
            <div class="container">
                <form class="form-horizontal form-find m-b-20">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control c-square c-theme" name="key"
                                   value="{{request()->query('key')}}" style="width: 100%">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm">
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-9">
                        <div class="art-list">
                            @foreach($blog as $blog)
                                <div class="a-item">
                                    <div class="thumbnail-image img-thumbnail">
                                        <a href="{{route('blog_detail',$blog->slug)}}"><img
                                                src="{{asset('uploads/blog/'.$blog->image)}}" alt="png-image"></a>
                                    </div>
                                    <div class="info">
                                        <div class="article_title ">
                                            <h2><a href="{{route('blog_detail',$blog->slug)}}"
                                                   style="text-transform: initial;"> {{$blog->title}} </a></h2>
                                        </div>
                                        <div class="article_cat_date">
                                            <div style="display: inline-block;margin-right: 15px"><i
                                                    class="fa fa-calendar" aria-hidden="true"></i> {{$blog->dateposted}}
                                            </div>
                                            {{--                                            <div style="display: inline-block"><i class="fa fa-newspaper-o"--}}
                                            {{--                                                                                  aria-hidden="true"></i> <a--}}
                                            {{--                                                    href="/blog/huong-dan" title="Hướng Dẫn">Hướng Dẫn</a></div>--}}
                                        </div>
                                        <div class="article_description hidden-xs">{{$blog->description}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                            {{--                            {{$blog->links('pagination::bootstrap-4')}}--}}

                            {{--                            <ul class="pagination pagination-sm">--}}
                            {{--                                <li class="page-item disabled"><span class="page-link">«</span></li>--}}
                            {{--                                <li class="page-item active"><span class="page-link">1</span></li>--}}
                            {{--                                <li class="page-item"><a class="page-link" href="https://nick.vn/blog?page=2">2</a></li>--}}
                            {{--                                <li class="page-item"><a class="page-link" href="https://nick.vn/blog?page=3">3</a></li>--}}
                            {{--                                <li class="page-item disabled hidden-xs"><span class="page-link">...</span></li>--}}
                            {{--                                <li class="page-item hidden-xs"><a class="page-link"--}}
                            {{--                                                                   href="https://nick.vn/blog?page=41">41</a></li>--}}
                            {{--                                <li class="page-item"><a class="page-link" href="https://nick.vn/blog?page=2"--}}
                            {{--                                                         rel="next">»</a></li>--}}
                            {{--                            </ul>--}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="c-content-ver-nav">
                            <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
                                <h3 class="c-font-bold c-font-uppercase">Danh mục</h3>
                                <div class="c-line-left c-theme-bg"></div>
                            </div>
{{--                            <ul class="c-menu c-arrow-dot1 c-theme">--}}
{{--                                <li><a href="/blog">Tất cả (34)</a></li>--}}
{{--                                <li><a href="/blog/uy-tin-cua-nickvn">Uy Tín Của Nick.vn (1)</a></li>--}}
{{--                                <li><a href="/blog/bai-ghim">Bài Ghim (4)</a></li>--}}
{{--                                <li><a href="/blog/tin-game">Tin Game (10)</a></li>--}}
{{--                                <li><a href="/blog/huong-dan">Hướng Dẫn (19)</a></li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

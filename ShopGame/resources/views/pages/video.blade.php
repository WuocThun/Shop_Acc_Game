@extends('layout')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="video_highlight" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span id="video_title"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="video_description"></span>
                    <span id="video_link"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="c-layout-page">
        <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-sbold"><a href="/video" title="video tin tức">video tin tức</a>
                    </h3>
                </div>
                <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                    <li><a href="/">Trang chủ</a></li>
                    <li>/</li>
                    <li>
                        <a href="/video">
                            <h1>video tin tức</h1>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="c-content-box c-size-md">
            <div class="container">

                <div class="row">
                    <div class="col-md-9">
                        <div class="art-list">
                            @foreach($video as $video)
                                <div class="a-item">
                                    <div class="thumbnail-image img-thumbnail">
                                        <a class="video_click" onclick="return video_highligh({{$video->id}})" data-video-id="{{$video->id}}">
                                            <img
                                                src="{{asset('uploads/video/'.$video->image)}}" alt="png-image">
                                            </a>
                                    </div>
                                    <div class="info">
                                        <div class="article_title ">
                                            <a class="video_click" onclick="return video_highligh({{$video->id}})" data-video-id="{{$video->id}}">
                                            <h2>
                                                {{$video->title}}
                                            </h2>
                                            </a>

                                        </div>
                                        <div class="article_cat_date">

                                        </div>
                                        <div class="article_description hidden-xs">{{$video->description}}
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                            {{--                            {{$video->links('pagination::bootstrap-4')}}--}}

                            {{--                            <ul class="pagination pagination-sm">--}}
                            {{--                                <li class="page-item disabled"><span class="page-link">«</span></li>--}}
                            {{--                                <li class="page-item active"><span class="page-link">1</span></li>--}}
                            {{--                                <li class="page-item"><a class="page-link" href="https://nick.vn/video?page=2">2</a></li>--}}
                            {{--                                <li class="page-item"><a class="page-link" href="https://nick.vn/video?page=3">3</a></li>--}}
                            {{--                                <li class="page-item disabled hidden-xs"><span class="page-link">...</span></li>--}}
                            {{--                                <li class="page-item hidden-xs"><a class="page-link"--}}
                            {{--                                                                   href="https://nick.vn/video?page=41">41</a></li>--}}
                            {{--                                <li class="page-item"><a class="page-link" href="https://nick.vn/video?page=2"--}}
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
                            <ul class="c-menu c-arrow-dot1 c-theme">
                                <li><a href="/video">Tất cả (34)</a></li>
                                <li><a href="/video/uy-tin-cua-nickvn">Uy Tín Của Nick.vn (1)</a></li>
                                <li><a href="/video/bai-ghim">Bài Ghim (4)</a></li>
                                <li><a href="/video/tin-game">Tin Game (10)</a></li>
                                <li><a href="/video/huong-dan">Hướng Dẫn (19)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

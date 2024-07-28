@extends('layouts.app')
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật danh mục game</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{route('blog.index')}}" class="btn btn-info">Danh sách blog game</a>
                        <a href="{{route('blog.create')}}" class="btn btn-success">Thêm blog game</a>

                        <form action="{{route('blog.update',$blog->id)}}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" required class="form-control" value="{{$blog->title}}"
                                       onkeyup="ChangeToSlug();" id="slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">slug</label>
                                <input type="text" name="slug" required class="form-control" value="{{$blog->slug}}"
                                       id="convert_slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label> <br>

                                <input type="file" name="image" class="form-control-image" id="">
                                <img width="200px" height="100px"
                                     src="{{asset('uploads/blog/'.$blog->image)}}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control" required name="description"
                                          id="exampleFormControlTextarea1"
                                          rows="3">{{$blog->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Content</label>
                                <textarea class="form-control" required name="content"
                                          id="exampleFormControlTextarea1"
                                          rows="3">{{$blog->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select required class="form-control" name="status">
                                    @if($blog->status === 1)
                                        <option value="1" selected>Hiển thị</option>
                                        <option value="0">Không hiển thị</option>
                                    @else
                                        <option value="1">Hiển thị</option>
                                        <option value="0" selected>Không hiển thị</option>
                                    @endif
                                </select>
                                <label for="exampleFormControlSelect1">Loại tin</label>
                                <select required class="form-control" name="status">
                                    @if($blog->kind_of_blog === "blogs")
                                        <option value="blogs" selected>Blog</option>
                                        <option value="huongdan">Hướng dẫn</option>
                                    @else
                                        <option value="blogs">Blog</option>
                                        <option value="huongdan" selected>Hướng dẫn</option>
                                    @endif
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

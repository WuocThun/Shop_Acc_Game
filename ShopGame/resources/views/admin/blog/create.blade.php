@extends('layouts.app')
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Thêm blog game</div>
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
                        <a href="{{route('blog.index')}}" class="btn btn-success">Danh sách blog game</a>
                        <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="...."
                                       onkeyup="ChangeToSlug();" id="slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="slug"  class="form-control" placeholder="...." id="convert_slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label> <br>
                                <input type="file" name="image" class="form-control-image" placeholder="...."
                                       id="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control ckeditor" name="description"
                                          id="des_blog"
                                          rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Content</label>
                                <textarea class="ckeditor form-control" required name="content"
                                          id="cont_blog" placeholder="..."
                                         ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Loại tin</label>
                                <select class="form-control" name="kind_of_blog">
                                    <option value="blogs">Blog</option>
                                    <option value="huongdan">Hướng dẫn</option>
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

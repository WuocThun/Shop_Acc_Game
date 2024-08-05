@extends('layouts.app')
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Thêm nick game</div>
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
                        <a href="{{route('nick.index')}}" class="btn btn-success">Danh sách nick game</a>
                        <form action="{{route('nick.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="....">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label> <br>
                                <input type="file" name="image" class="form-control-image" placeholder="...."
                                       id="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control ckeditor" name="description"
                                          id="des_nick"
                                          rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price</label>
                                <input type=number class="form-control ckeditor" name="price"
                                       id="des_nick">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Thuộc game</label>
                                <select class="form-control choose_category" name="category_id">
                                    <option value="0">--- Chọn game cần thêm ---</option>
                                    @foreach($category as $cast =>$cat)
                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="show_attribute">
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

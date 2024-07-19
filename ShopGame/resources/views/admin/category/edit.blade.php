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
                        <a href="{{route('category.index')}}" class="btn btn-info">Danh sách danh mục game</a>
                        <a href="{{route('category.create')}}" class="btn btn-success">Thêm danh mục game</a>

                        <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" required class="form-control" value="{{$category->title}}" id="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label> <br>

                                <input type="file" name="image" class="form-control-image"  id="">
                                <img width="200px" height="100px"
                                     src="{{asset('uploads/category/'.$category->image)}}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control" required name="description" id="exampleFormControlTextarea1"
                                         rows="3">{{$category->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select required class="form-control" name="status">
                                    @if($category->status === 1)
                                    <option value="1" selected >Hiển thị</option>
                                        <option value="0" >Không hiển thị</option>

                                    @else
                                        <option value="1" >Hiển thị</option>
                                        <option value="0" selected>Không hiển thị</option>

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

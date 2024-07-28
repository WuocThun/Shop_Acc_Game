@extends('layouts.app')
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm phụ kiện</div>
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
                        <a href="{{route('accessories.index')}}" class="btn btn-success">Danh sách accessories game</a>
                        <form action="{{route('accessories.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="...."
                                       onkeyup="ChangeToSlug();" id="slug">
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
                                <select class="form-control" name="category_id">
                                    @foreach($category as $cast =>$cat)
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

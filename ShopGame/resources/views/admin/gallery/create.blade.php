@extends('layouts.app')
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Thêm gallery game</div>
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
                        <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="nick_id" value="{{\Illuminate\Support\Facades\Request::segment(2)}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn ảnh</label> <br>
                                <input type="file" name="image[]" class="form-control-image" required multiple>
                            </div>

                            <div id="show_attribute">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>

                    </div>
                    <table id="myTable" class="table">
                        <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Tên gallery</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Hành động</th>
                        </thead>
                        <tbody>
                        @foreach($all_galary as $key =>$cate )
{{--                            {{dd($cate)}}--}}
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$cate->title}}</td>
                                <td><img width="200px" height="100px"
                                         src="{{asset('uploads/gallery/'.$cate->image)}}" alt=""></td>
                                <TD>
                                    <a class="btn btn-warning"
                                       href="{{route('gallery.edit',$cate->id)}}">Sửa</a>
                                    <form method="post" action="{{route('gallery.destroy',[$cate->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có muốn xoá?')"
                                                class="btn btn-danger">Xoá
                                        </button>
                                    </form>
                                </TD>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection

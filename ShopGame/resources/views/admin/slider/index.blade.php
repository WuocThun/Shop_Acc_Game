@extends('layouts.app')
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Liệt kê Slider Game</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{route('slider.create')}}" class="btn btn-success">Thêm danh mục game</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <table id="myTable" class="table">
                                    <thead>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Hiển thị</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Quản lý</th>
                                    <th scope="col">Hành động</th>
                                    </thead>
                                    <tbody>
                                    @foreach($slider as $key =>$cate )
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$cate->title}}</td>
                                            <td>{{$cate->slug}}</td>
                                            <td>{{$cate->description}}</td>
                                            <td>
                                                @if($cate->status == 1)
                                                    Hiển thị
                                                @else
                                                    Không hiện thị
                                                @endif
                                            </td>
                                            <td><img width="200px" height="100px"
                                                     src="{{asset('uploads/slider/'.$cate->image)}}" alt=""></td>
                                            <td></td>
                                            <td>
                                                <a class="btn btn-warning"  href="{{route('slider.edit',$cate->id)}}">Sửa</a>
                                                <form method="post"  action="{{route('slider.destroy',[$cate->id])}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button onclick="return confirm('Bạn có muốn xoá?')" class="btn btn-danger">Xoá</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </th>
                            </tr>
                            </thead>
                        </table>
{{--                            {{$category->links('pagination::boostrap-4')}}--}}
{{--                            {{$category->links('pagination::bootstrap-4')}}--}}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

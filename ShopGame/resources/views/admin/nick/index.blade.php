@extends('layouts.app')
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Danh Sách nick</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{route('nick.create')}}" class="btn btn-success"> Thêm nick Game </a>
                        <table class="table">
                            <thead>
                            <tr>
                                <table id="myTable" class="table">
                                    <thead>
                                    <th scope="col">ID</th>
                                    <th scope="col">Mã số</th>
                                    <th scope="col">Tên Nick</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Hiển thị</th>
                                    <th scope="col">Thuộc tính</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Thuộc tính</th>
                                    <th scope="col">Hành động</th>
                                    </thead>
                                    <tbody>
                                    @foreach($nick as $key =>$cate )
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$cate->title}}</td>
                                            <td>{{$cate->ms}}</td>
                                            <td>{{$cate->description}}</td>
                                            <td>
                                                @if($cate->status == 1)
                                                    Hiển thị
                                                @else
                                                    Không hiện thị
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $attribue = json_decode($cate->attribute, true);

                                                    if (is_array($attribue)) {
                                                        foreach ($attribue as $atr) {
                                                            echo '<span class="badge badge-dark">'.$atr.'</span>';
                                                        }
                                                    }else {
                                                        echo '<p>Chưa có thuộc tính</p>';
                                                    }
                                                @endphp

                                            </td>
                                            <td>{{$cate->category->title}}</td>
                                            <td><img width="200px" height="100px"
                                                     src="{{asset('uploads/nick/'.$cate->image)}}" alt=""></td>
                                            <TD>
                                                <a class="btn btn-warning"
                                                   href="{{route('nick.edit',$cate->id)}}">Sửa</a>
                                                <form method="post" action="{{route('nick.destroy',[$cate->id])}}">
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

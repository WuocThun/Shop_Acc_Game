@extends('layouts.app')
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Liệt kê phụ kiện</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="{{route('accessories.create')}}" class="btn btn-success">Thêm Phụ kiện game</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <table id="myTable" class="table">
                                    <thead>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Hiển thị</th>
                                    <th scope="col">Danh mục Game</th>
                                    <th scope="col">Hành động</th>
                                    </thead>
                                    <tbody>
                                    @foreach($accessories as $key =>$access )
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$access->title}}</td>
                                            <td>
                                                @if($access->status == 1)
                                                    Hiển thị
                                                @else
                                                    Không hiện thị
                                                @endif
                                            </td>
                                            <td>
                                                {{$access->category->title}}
                                            </td>

                                            <td>
                                                <a class="btn btn-warning"  href="{{route('accessories.edit',$access->id)}}">Sửa</a>
                                                <form method="post"  action="{{route('accessories.destroy',[$access->id])}}">
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
{{--                            {{$accessgory->links('pagination::boostrap-4')}}--}}
{{--                            {{$accessgory->links('pagination::bootstrap-4')}}--}}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

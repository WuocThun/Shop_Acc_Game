@extends('layouts.app')
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật phụ kiện</div>
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
                        <a href="{{route('accessories.index')}}" class="btn btn-info">Danh sách accessories game</a>
                        <a href="{{route('accessories.create')}}" class="btn btn-success">Thêm accessories game</a>

                        <form action="{{route('accessories.update',$accessories->id)}}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" required class="form-control" value="{{$accessories->title}}"
                                       onkeyup="ChangeToSlug();" id="slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select required class="form-control" name="status">
                                    @if($accessories->status === 1)
                                        <option value="1" selected>Hiển thị</option>
                                        <option value="0">Không hiển thị</option>

                                    @else
                                        <option value="1">Hiển thị</option>
                                        <option value="0" selected>Không hiển thị</option>

                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Thuộc game</label>
                                <select required class="form-control" name="category_id">
                                    @foreach($categories as $category => $cat)
                                        <option value="{{$cat->id ==$accessories->category_id ? 'selected':''}}" selected>Hiển thị</option>
                                        <option {{$cat->id ==$accessories->category_id ? 'selected':''}} value="{{$cat->id}}" >{{$cat->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.app')
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật nick game</div>
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
                        <a href="{{route('nick.index')}}" class="btn btn-info">Danh sách nick game</a>
                        <a href="{{route('nick.create')}}" class="btn btn-success">Thêm nick game</a>

                        <form action="{{route('nick.update',$nick->id)}}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" required class="form-control" value="{{$nick->title}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">slug</label>
                                <input type="text" name="price" required class="form-control" value="{{$nick->price}}"
                                       id="convert_slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label> <br>

                                <input type="file" name="image" class="form-control-image" id="">
                                <img width="200px" height="100px"
                                     src="{{asset('uploads/nick/'.$nick->image)}}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control" required name="description"
                                          id="exampleFormControlTextarea1"
                                          rows="3">{{$nick->description}}</textarea>
                            </div>

                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="exampleInputPassword1">Content</label>--}}
                            {{--                                <textarea class="form-control" required name="content"--}}
                            {{--                                          id="exampleFormControlTextarea1"--}}
                            {{--                                          rows="3">{{$nick->content}}</textarea>--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Thuộc game</label>
                                <select class="form-control" name="category_id">
                                    <option value="0">--- Chọn game cần thêm ---</option>
                                    @foreach($category as $cast =>$cat)

                                        <option {{$cat->id==$nick->category_id ? 'selected' : ''}}  value="{{$cat->id}}">{{$cat->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select required class="form-control" name="status">
                                    @if($nick->status === 1)
                                        <option value="1" selected>Hiển thị</option>
                                        <option value="0">Không hiển thị</option>
                                    @else
                                        <option value="1">Hiển thị</option>
                                        <option value="0" selected>Không hiển thị</option>
                                    @endif
                                </select>
                                <label for="exampleFormControlSelect1">Thuộc game</label>
                                <textarea class="form-control" required name="attribute"
                                          id="exampleFormControlTextarea1"
                                          rows="3">{{$nick->attribute}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

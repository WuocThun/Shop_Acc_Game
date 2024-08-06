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
                </div>
            </div>
        </div>
    </div>

@endsection

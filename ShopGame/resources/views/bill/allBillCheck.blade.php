
@extends('layout')
@section('content')
{{--<style>--}}
{{--    body {--}}
{{--        font-family: Arial, sans-serif;--}}
{{--        background-color: #f4f4f4;--}}
{{--        margin: 0;--}}
{{--        padding: 0;--}}
{{--    }--}}

{{--    .container {--}}
{{--        width: 100%;--}}
{{--        max-width: 600px;--}}
{{--        margin: 50px auto;--}}
{{--        padding: 20px;--}}
{{--        background: #fff;--}}
{{--        border-radius: 5px;--}}
{{--        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);--}}
{{--    }--}}

{{--    h1 {--}}
{{--        text-align: center;--}}
{{--        color: #333;--}}
{{--    }--}}

{{--    .customer-info, .order-details {--}}
{{--        margin-top: 20px;--}}
{{--    }--}}

{{--    .customer-info h2, .order-details h2 {--}}
{{--        color: #333;--}}
{{--        margin-bottom: 10px;--}}
{{--    }--}}

{{--    .customer-info p, .order-details p {--}}
{{--        margin: 5px 0;--}}
{{--    }--}}

{{--    table {--}}
{{--        width: 100%;--}}
{{--        border-collapse: collapse;--}}
{{--        margin: 10px 0;--}}
{{--    }--}}

{{--    th, td {--}}
{{--        border: 1px solid #ccc;--}}
{{--        padding: 10px;--}}
{{--        text-align: left;--}}
{{--    }--}}

{{--    th {--}}
{{--        background: #f8f8f8;--}}
{{--    }--}}

{{--    .total {--}}
{{--        font-weight: bold;--}}
{{--        margin-top: 10px;--}}
{{--    }--}}

{{--    .btn {--}}
{{--        width: 100%;--}}
{{--        padding: 10px;--}}
{{--        background: #007bff;--}}
{{--        color: #fff;--}}
{{--        border: none;--}}
{{--        border-radius: 5px;--}}
{{--        cursor: pointer;--}}
{{--        margin-top: 20px;--}}
{{--    }--}}

{{--    .btn:hover {--}}
{{--        background: #0056b3;--}}
{{--    }--}}

{{--</style>--}}
    <title>Danh Sách Đặt Hàng</title>
</head>
<body>
<div class="container">
    <h1>Danh Sách Đặt Hàng</h1>
    <div class="customer-info">
        <h2>Thông Tin Khách Hàng</h2>
        <p><strong>Họ và Tên:</strong> <span id="customer-name">{{$nameAuthor}}</span></p>
{{--        <p><strong>Email:</strong> <span id="customer-email">{{\Illuminate\Support\Facades\Auth::user()->email}}</span></p>--}}

    <div class="order-details">
        <h2>Chi Tiết Đơn Hàng</h2>
        <table class="table table-striped table-dark">
            <thead class="thead-dark">
            <tr>
                <td>Stt</td>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
            </tr>
            </thead>
            <tbody>

                @foreach($bill as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                    <td>{{$value->nick->title}}</td>
                    <td>{{$value->total}}</td>
                </tr>
{{--                    <p class="total"><strong>Tổng Tiền:</strong> {{$totalMoney}}</p>--}}

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


{{--@php--}}
{{--    $attribue = json_decode($nick->attribute, true);--}}

{{--    if (is_array($attribue)) {--}}
{{--        foreach ($attribue as $atr) {--}}
{{--            echo '<span class="badge badge-dark">'.$atr.'</span>';--}}
{{--        }--}}
{{--    }else {--}}
{{--        echo '<p>Chưa có thuộc tính</p>';--}}
{{--    }--}}
{{--@endphp--}}
{{--{{Auth::user()->id}}--}}


    <title>Thông Tin Đặt Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .order-summary {
            margin-top: 20px;
        }

        .order-summary h2 {
            color: #333;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #f8f8f8;
        }

        .total {
            font-weight: bold;
            margin-top: 10px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .btn:hover {
            background: #0056b3;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Thông Tin Đặt Hàng</h1>
    <div class="order-summary">
        <h2>Thông Tin Khách Hàng</h2>
        <p><strong>Họ và Tên:</strong> <span id="customer-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span></p>
        <p><strong>Email:</strong> <span id="customer-email">{{\Illuminate\Support\Facades\Auth::user()->email}}</span></p>

        <h2>Chi Tiết Đơn Hàng</h2>
        <table>
            <thead>
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$nick->title}}</td>
                <td>1</td>
                @php
                $countMoney = Session::get('countMoney');
                @endphp
                <td>                                {{number_format($nick->price,0,',','.')}} VNĐ

                </td>
            </tr>

            </tbody>
        </table>
        <p class="total"><strong>Tổng Tiền:</strong> {{session('countMoney')}} VNĐ</p>
    </div>
    <a href="{{url('allBillCheck',Auth::user()->id)}}" class="btn" >Xác nhận đơn hàng </a>
</div>
</body>
</html>

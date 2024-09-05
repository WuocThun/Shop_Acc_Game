@extends('layout')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
        }

        header h1 {
            display: inline;
            margin: 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: inline;
            float: right;
        }

        nav ul li {
            display: inline;
            margin-left: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        .hero {
            background-color: #007bff;
            color: #fff;
            padding: 100px 0;
            text-align: center;
        }

        .hero .btn {
            background-color: #ffc107;
            color: #343a40;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .hero .btn:hover {
            background-color: #e0a800;
        }

        .about {
            padding: 50px 0;
            text-align: center;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

    </style>

<main>
    <section class="hero">
        <div class="container">
            <h2>Chào mừng đến với TShopAcc!</h2>
            <p>Chúng tôi cung cấp các tài khoản game chất lượng với giá cả phải chăng.</p>
            <a href="/" class="btn">Xem Sản Phẩm</a>
        </div>
    </section>
    <section class="about">
        <div class="container">
            <h2>Về Chúng Tôi</h2>
            <p>
                TShopAcc là nơi uy tín để bạn tìm thấy các tài khoản game yêu thích. Với nhiều năm kinh nghiệm trong lĩnh vực này, chúng tôi cam kết đem đến cho khách hàng sự hài lòng tuyệt đối.
                Tại TShopAcc, chúng tôi hiểu rằng việc sở hữu một tài khoản game tốt không chỉ giúp bạn trải nghiệm trò chơi một cách tốt nhất mà còn có thể giúp bạn nổi bật trong cộng đồng game thủ.
            </p>
            <p>
                Chúng tôi cung cấp đa dạng các loại tài khoản game từ nhiều tựa game phổ biến như Liên Quân Mobile, PUBG, Free Fire, và nhiều hơn nữa. Mỗi tài khoản được chúng tôi kiểm tra kỹ lưỡng trước khi giao đến tay khách hàng, đảm bảo bạn nhận được một sản phẩm hoàn hảo và an toàn nhất.
            </p>
            <p>
                Đội ngũ nhân viên của TShopAcc luôn sẵn sàng hỗ trợ bạn 24/7, giải đáp mọi thắc mắc và giúp bạn chọn lựa tài khoản phù hợp nhất. Chúng tôi cũng cung cấp các dịch vụ bảo mật tài khoản, giúp bạn an tâm hơn khi sử dụng.
            </p>
            <p>
                Ngoài ra, TShopAcc thường xuyên có các chương trình khuyến mãi, giảm giá và các sự kiện đặc biệt dành cho khách hàng thân thiết. Chúng tôi luôn nỗ lực để mang đến cho bạn những trải nghiệm tốt nhất và giá trị vượt trội khi mua sắm tại TShopAcc.
            </p>
            <p>
                Hãy đến với TShopAcc và khám phá thế giới game đầy thú vị cùng chúng tôi. TShopAcc - nơi đem lại cho bạn những giây phút giải trí tuyệt vời và đẳng cấp.
            </p>
        </div>
    </section>
</main>
<footer>
    <div class="container">
        <p>&copy; 2024 TShopAcc. All rights reserved.</p>
    </div>
</footer>
@endsection

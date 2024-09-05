@extends('layout')
@section('content')
    <div class="c-content-box c-size-lg c-overflow-hide c-bg-white">
        <div class="container">
            <nav aria-label="breadcrumb" style="display:none">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>
                    {{--                <li class="breadcrumb-item"><a href="{{route('danhmuccon',[$category->slug])}}" title="Liên quân">{{$category->title}}</a></li>--}}
                    {{--                <li class="breadcrumb-item active" aria-current="page">{{$nick->ms}}</li>--}}
                </ol>
            </nav>
            <div class="c-shop-product-details-4">
                <div class="row">
                    <div class="col-md-4 m-b-20">
                        <div class="c-product-header">
                            <!--<h4 class="c-font-uppercase c-font-bold">Liên minh huyền thoại - Việt Nam</h4>-->
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">#{{$nick->ms}}</h3>
                                <span class="c-font-red c-font-bold">{{$category->title}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 visible-sm visible-xs visible-sm">
                        <div class="text-center m-t-20">
                            <img class="img-responsive img-thumbnail" src="/storage/images/ILTS15nlZf_1650210905.jpg"
                                 alt="png-image">
                        </div>
                        <div class="c-product-meta">
                            <div class="c-content-divider">
                                <i class="icon-dot"></i>
                            </div>
                            <div class="row">
                            </div>
                            <div class="c-content-divider">
                                <i class="icon-dot"></i>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-meta">
                        <div class="c-product-price c-theme-font" style="float: none;text-align: center">
                            <div class="position1">
                                {{number_format($nick->price,0,',','.')}} VNĐ
                            </div>
                        </div>
                        <div style="display: none">
                        </div>
                        <script type="text/javascript">
                            $('.c-product-price').append($('.position0'));
                            $('.c-product-price').append($('.position1'));
                        </script>
                    </div>
                    <div class="col-md-4 text-right">
                        <div class="c-product-header">

                        </div>
                    </div>
                </div>
                <div class="c-product-meta visible-md visible-lg">
                    <div class="c-content-divider">
                        <i class="icon-dot"></i>
                    </div>
                    <div class="row">


                        @php
                            $attribue = json_decode($nick->attribute, true);

                            if (is_array($attribue)) {
                                foreach ($attribue as $atr) {
                                    echo ' <div class="col-sm-4 col-xs-6 c-product-variant">
                            <p style="color:red"  class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">'.$atr.'</p>
                        </div>';
                                }
                            }else {
                                echo '<p>Chưa có thuộc tính</p>';
                            }
                        @endphp
                        <div class="clearfix">
                            <style>
                                .mota_game {
                                    text-transform: uppercase;
                                    margin: 0 15px;
                                    color: chocolate;
                                    font-weight: bold;
                                    font-size: 20px;
                                }
                            </style>
                            <p style="text-transform: uppercase; color: red; font-weight: bold; font-size: 20px"> Mô tả:<span
                                    class="mota_game">{{$nick->description}}</span></p>
                        </div>
                    </div>
                    <div class="c-content-divider">
                        <i class="icon-dot"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container m-t-20 content_post">
            @foreach ($gallery as $key => $gly)
                <p>
                    <a rel="gallery1" data-fancybox="images" href="{{asset('uploads/gallery/'.$gly->image)}}">
                        <img class="img-responsive img-thumbnail" src="{{asset('uploads/gallery/'.$gly->image)}}"
                             alt="{{$gly->title}}">
                    </a>
                </p>
            @endforeach
            <div class="buy-footer" style="text-align: center">
                @if(Auth::check())
                    <a href="{{url('getNick',[$nick->ms])}}" class="btn c-btn btn-lg c-theme-btn ">Mua ngay</a>
                @else
                        <a href="/login"
                           class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
                            <i class="icon-user"></i> Đăng nhập mới mua được bạn nhé</a>
                @endif
            </div>
        </div>
        <div class="hidden">
        </div>
        <div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif"
                                                                    style="width: 50px;height: 50px;display: none"
                                                                    alt="png-image"></div>
                <div class="modal-content">
                    <form method="POST" action="https://nick.vn/buyacc/518323" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data" data-hs-cf-bound="true">
                        <input name="_token" type="hidden" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title">Xác nhận mua tài khoản</h4>
                        </div>
                        <div class="modal-body">
                            <div class="c-content-tab-4 c-opt-3" role="tabpanel">
                                <ul class="nav nav-justified" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#payment" role="tab" data-toggle="tab" class="c-font-16">Thanh toán</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#info" role="tab" data-toggle="tab" class="c-font-16">Tài khoản</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="payment">
                                        <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                                            <li class="c-font-dark">
                                                <table class="table table-striped">
                                                    <tbody>
                                                    <tr>
                                                        <th colspan="2">Thông tin tài khoản #518323</th>
                                                    </tr>
                                                    </tbody>
                                                    <tbody>
                                                    <tr>
                                                        <td>Nhà phát hành:</td>
                                                        <th>Garena</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Tên game:</td>
                                                        <th>Liên quân</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Giá tiền:</td>
                                                        <th class="text-info">4,200,000đ</th>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </li>
                                        </ul>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="info">
                                        <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                                            <li class="c-font-dark">
                                                <table class="table table-striped">
                                                    <tbody>
                                                    <tr>
                                                        <th colspan="2">Chi tiết tài khoản #518323</th>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:50%">Rank:</td>
                                                        <td class="text-danger" style="font-weight: 700">Cao Thủ</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 50%">Tướng:</td>
                                                        <td class="text-danger" style="font-weight: 700">110</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 50%">Trang Phục:</td>
                                                        <td class="text-danger" style="font-weight: 700">139</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:50%">Ngọc 90:</td>
                                                        <td class="text-danger" style="font-weight: 700">Có</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:50%">Nick có tướng trong đá quý:</td>
                                                        <td class="text-danger" style="font-weight: 700">Có</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:50%">Nick có trang phục trong đá quý:</td>
                                                        <td class="text-danger" style="font-weight: 700">Có</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-3 form-control-label">Mã giảm giá:</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control c-square c-theme " name="coupon"
                                           placeholder="Mã giảm giá" value="">
                                    <span class="help-block">Nhập mã giảm giá nếu có để nhận ưu đãi</span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-12 form-control-label text-danger"
                                       style="text-align: center;margin: 10px 0; ">
                                    Bạn phải đăng nhập mới có thể mua tài khoản tự động.
                                </label>
                            </div>
                            <div style="clear: both"></div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/login">Đăng
                                nhập</a>
                            <button type="button"
                                    class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                                    data-dismiss="modal">Đóng
                            </button>
                        </div>
                    </form>
                    <script>
                        $(document).ready(function () {
                            $('.load-modal').each(function (index, elem) {
                                $(elem).unbind().click(function (e) {
                                    e.preventDefault();
                                    e.preventDefault();
                                    var curModal = $('#LoadModal');
                                    curModal.find('.modal-content').html('<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;"></div>');
                                    curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection

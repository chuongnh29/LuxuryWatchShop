@extends('master')

@section('title')
    Thanh toán đơn hàng
@endsection

@section('content')
    <!--================Categories Banner Area =================-->
    <section class="categories_banner_area">
        <div class="container">
            <div class="c_banner_inner">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="current">Thanh toán</li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->
    <!--================Register Area =================-->
    <section class="register_area p_100">
        <div class="container">
            @if(Session::has('thongbao'))
                <div class="alert alert-success">{{Session::get('thongbao')}}</div>
            @endif
            <form action="{{route('checkout')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="register_inner">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="billing_details">
                                <h2 class="reg_title">Thông tin khách hàng</h2>
                                <div class="billing_inner row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">HỌ VÀ TÊN <span>*</span></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{Auth::user()->fullname}}" aria-describedby="name"
                                                   placeholder="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">ĐỊA CHỈ <span>*</span></label>
                                            <div id="user_address" role="tablist" class="price_method"
                                                 style="border: 0px;">
                                                <div class="card">
                                                    <div class="card-header" role="tab">
                                                        <h5 class="mb-0">
                                                            <a data-toggle="collapse" href="#default_address"
                                                               role="button"
                                                               aria-expanded="true" aria-controls="collapseOne">
                                                                Địa chỉ giao hàng mặc định
                                                            </a>
                                                        </h5>
                                                    </div>

                                                    <div id="default_address" class="collapse show" role="tabpanel"
                                                         aria-labelledby="headingOne" data-parent="#user_address">
                                                        <div class="card-body">
                                                            <textarea class="form-control" id="address" name="address"
                                                                      rows="2"
                                                                      readonly>{{Auth::user()->address}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header" role="tab">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse"
                                                               href="#other_address"
                                                               role="button" aria-expanded="false"
                                                               aria-controls="collapseThree">
                                                                Địa chỉ giao hàng khác
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="other_address" class="collapse" role="tabpanel"
                                                         aria-labelledby="headingThree" data-parent="#user_address">
                                                        <div class="card-body">
                                                            <textarea class="form-control" id="other_address"
                                                                      name="other_address"
                                                                      rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email">EMAIL <span>*</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   value="{{Auth::user()->email}}"
                                                   aria-describedby="email" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">ĐIỆN THOẠI LIÊN HỆ <span>*</span></label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                   value="{{Auth::user()->phone_number}}"
                                                   aria-describedby="phone" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="order">GHI CHÚ</label>
                                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="order_box_price">
                                <h2 class="reg_title">Đơn hàng của bạn</h2>
                                <div class="payment_list">
                                    <div class="price_single_cost">
                                        @if(Session::has('cart'))
                                            @foreach($product_cart as $cart)
                                                <h5>{{$cart['item']['name']}}
                                                    <span>
                                                    @if($cart['item']['promotion_price'] == 0)
                                                            {{($cart['qty'])}} *
                                                            $ {{number_format($cart['item']['unit_price'])}} $
                                                        @else
                                                            {{($cart['qty'])}} *
                                                            $ {{number_format($cart['item']['promotion_price'])}}
                                                        @endif</span>
                                                </h5>
                                            @endforeach
                                            <h4>Thành tiền <span>@if(Session::has('cart'))
                                                        $ {{number_format($totalPrice)}}
                                                    @endif</span><br/><br/>
                                                Chiết khấu <span>@if(Session::has('cart'))
                                                        $ 0
                                                    @endif</span></h4>

                                            <h3><span class="normal_text">Tổng cộng</span> <span> @if(Session::has('cart'))
                                                        $ {{number_format($totalPrice)}}
                                                    @endif</span></h3>

                                        @endif
                                    </div>
                                    <div id="accordion" role="tablist" class="price_method">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" href="#collapseOne" role="button"
                                                       aria-expanded="true" aria-controls="collapseOne">
                                                        Chuyển khoản qua ngân hàng
                                                    </a>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" role="tabpanel"
                                                 aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    Chuyển khoản đến tài khoản sau:<br/>
                                                    - Số tài khoản: 123456789<br/>
                                                    - Chủ tài khoản: Nguyễn Hồng Chương<br/>
                                                    - Ngân hàng TMCP Ngoại thương Việt Nam - Chi nhánh Thành Công
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingThree">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo"
                                                       role="button" aria-expanded="false"
                                                       aria-controls="collapseThree">
                                                        Thanh toán khi nhận hàng
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" role="tabpanel"
                                                 aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    Vì hàng có giá trị lớn, vui lòng đặt cọc trước 30% giá trị trước khi
                                                    Công ty sẽ giao hàng cho bạn
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn subs_btn form-control" href="#">Đặt hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--================End Register Area =================-->
@endsection

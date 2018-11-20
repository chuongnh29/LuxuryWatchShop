@extends('master')

@section('title')
    Đăng nhập
@endsection

@section('content')
    <!--================Categories Banner Area =================-->
    <section class="categories_banner_area">
        <div class="container">
            <div class="c_banner_inner">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="current">Đăng nhập</li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->

    <!--================login Area =================-->
    <section class="login_area p_100">
        <div class="container">
            <div class="login_inner">
                <div class="row">

                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="login_title">
                            @if(Session::has('flag'))
                                <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
                            @else
                                <div class="alert alert-danger">Vui lòng đăng nhập tài khoản để thanh toán đơn hàng của bạn.</div>
                            @endif
                            <h2>đăng nhập vào tài khoản của bạn</h2>
                        </div>
                        <form class="login_form row" action="{{route('checklogin')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="col-lg-4">Tên đăng nhập</div>
                            <div class="col-lg-7 form-group">
                                <input class="form-control" type="text" name="username"
                                       placeholder="Nhập tên đăng nhập">
                            </div>
                            <div class="col-lg-4">Mật khẩu</div>
                            <div class="col-lg-7 form-group">
                                <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label for="f-option">Ghi nhớ đăng nhập</label>
                                    <div class="check"></div>
                                </div>
                                <a href="{{route('forgotpassword')}}"><h4>Quên mật khẩu?</h4></a>

                            </div>
                            <div class="col-lg-12 form-group">
                                <button type="submit" value="submit" class="btn subs_btn form-control">đăng nhập
                                </button>
                                <a href="{{route('register')}}"><h4>Chưa có tài khoản? Đăng ký ngay</h4></a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3"></div>

                </div>
            </div>
        </div>
    </section>
    <!--================End login Area =================-->
@endsection
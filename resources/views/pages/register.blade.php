@extends('master')

@section('title')
    Đăng ký
@endsection

@section('content')
    <!--================Categories Banner Area =================-->
    <section class="categories_banner_area">
        <div class="container">
            <div class="c_banner_inner">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="current">Đăng ký</li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->

    <section class="login_area p_100">
        <div class="container">
            <div class="login_inner">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="login_title">
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}
                                    @endforeach
                                </div>
                            @endif
                            @if(Session::has('Register Success'))
                                <div class="alert alert-success">{{Session::get('Register Success')}}</div>
                            @endif
                            <h2>đăng ký tài khoản mới</h2>
                        </div>
                        <form class="login_form row" action="{{route('register')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="col-lg-6 form-group">
                                <label for="email">Tên đăng nhập <span>*</span></label>
                                <input class="form-control" type="text" name="username"
                                       placeholder="Nhập tên tài khoản" required>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="email">Email <span>*</span></label>
                                <input class="form-control" type="email" name="email" placeholder="Nhập địa chỉ email"
                                       required>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="email">Mật khẩu <span>*</span></label>
                                <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu"
                                       required>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="email">Xác nhận mật khẩu <span>*</span></label>
                                <input class="form-control" type="password" name="re_password"
                                       placeholder="Nhập lại mật khẩu" required>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="email">Họ tên <span>*</span></label>
                                <input class="form-control" type="text" name="fullname"
                                       placeholder="Nhập họ tên đầy đủ" required>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="email">Số điện thoại <span>*</span></label>
                                <input class="form-control" type="text" name="phone_number"
                                       placeholder="Nhập số điện thoại" required>
                            </div>

                            <div class="col-lg-12 form-group">
                                <label for="email">Địa chỉ <span>*</span></label>
                                <input class="form-control" type="text" name="address"
                                       placeholder="Nhập địa chỉ của bạn" required>
                            </div>

                            <div class="col-lg-6 form-group">
                                <h3>* Các trường bắt buộc</h3>
                            </div>

                            <div class="col-lg-6 form-group">
                            </div>

                            <div class="col-lg-6 form-group" style="align-items: center">
                                <button type="submit" class="btn subs_btn register_btn form-control">đăng ký
                                </button>
                            </div>

                            <div class="col-lg-6 form-group" style="align-items: center">
                                <a href="{{route('login')}}">
                                    <button type="button" value="login" class="btn subs_btn register_btn form-control">
                                        đăng nhập
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </div>
    </section>
    <!--================End login Area =================-->
@endsection
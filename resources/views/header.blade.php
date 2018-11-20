<!--================Top Header Area =================-->
<div class="header_top_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="top_header_left">
                    <div class="selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="public/source/assets/dest/img/icon/flag-vi.jpg"
                                    data-imagecss="flag yt"
                                    data-title="Vietnam">Vietnam
                            </option>
                            <option value='yu' data-image="public/source/assets/dest/img/icon/flag-en.png"
                                    data-imagecss="flag yu"
                                    data-title="English">English
                            </option>
                        </select>
                    </div>

                    <div class="input-group">
                        <form role="search" method="get" action="{{route('search')}}">
                            <input type="text" name="key_word" class="form-control" placeholder="Tìm kiếm ..."
                                   aria-label="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit"><i class="icon-magnifier"></i></button>
                                </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="top_header_middle">
                    <a href="tel:0988211231"><i class="fa fa-phone"></i> Hotline: <span>+84 988 666 999</span></a>
                    <a href="mailto:luxurywatch94@gmail.com"><i class="fa fa-envelope"></i> Email: <span>luxurywatch94@gmail.com</span></a>
                    <a href="{{route('home')}}"><img src="public/source/assets/dest/img/logo.png" alt="" height="74px"
                                                     width="400px"></a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="top_right_header">
                    <li class="account">
                        @if(Auth::check())
                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i>
                                Xin chào, {{Auth::user()->username}}
                                <i class="fa fa-angle-down"></i>
                            </a>
                        @else
                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i>
                                Đăng nhập | Đăng ký
                                <i class="fa fa-angle-down"></i>
                            </a>
                        @endif

                        <ul class="account_selection">
                            @if(Auth::check())
                                <li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Đổi
                                        mật khẩu</a></li>
                                <li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng
                                        xuất</a></li>
                            @else
                                <li><a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng
                                        nhập</a></li>
                                <li><a href="{{route('register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng
                                        ký</a></li>
                            @endif
                        </ul>
                    </li>
                    <ul class="top_right">
                        <div class="header-wrapicon2">
                            @if(Session::has('cart'))
                                <i class="icon-handbag icons js-show-header-dropdown"
                                   alt="ICON">
                            <span class="cart_quantity">

                                    {{Session('cart')->totalQty}}

                                    </span>
                                </i>
                                <!-- Header cart noti -->
                                <div class="header-cart header-dropdown">
                                    <ul class="header-cart-wrapitem">
                                        @foreach($product_cart as $product)
                                            <li class="header-cart-item">
                                                <a href="{{route('delcart', $product['item']['id'])}}">
                                                    <div class="header-cart-item-img">
                                                        <img src="public/source/img/product/{{$product['item']['image']}}"
                                                             alt="IMG">
                                                    </div>
                                                </a>
                                                <div class="header-cart-item-txt">
                                                    <a href="" class="header-cart-item-name">
                                                        {{$product['item']['name']}}
                                                    </a>

                                                    <span class="header-cart-item-info">
									{{$product['qty']}}
                                                        x @if($product['item']['promotion_price'] == 0)
                                                            $ {{number_format($product['item']['unit_price'])}}
                                                        @else
                                                            $ {{number_format($product['item']['promotion_price'])}}
                                                        @endif
								</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="header-cart-total">
                                        Tổng tiền: $ {{number_format(Session('cart')->totalPrice)}}
                                    </div>

                                    <div class="header-cart-buttons">
                                        <div class="header-cart-wrapbtn">
                                            <!-- Button -->
                                            <a href="{{route('cart')}}"
                                               class="flex-c-m size1 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
                                                Xem giỏ hàng
                                            </a>
                                        </div>

                                        <div class="header-cart-wrapbtn">
                                            <!-- Button -->
                                            @if(Auth::check())
                                                <a href="{{route('checkout')}}"
                                                   class="flex-c-m size1 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
                                                    Thanh toán
                                                </a>
                                            @else
                                                <a href="{{route('checklogin')}}"
                                                   class="flex-c-m size1 bg1 bo-rad-5 hov1 s-text1 trans-0-4">
                                                    Thanh toán
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="{{route('emptycart')}}">
                                    <i class="icon-handbag icons js-show-header-dropdown"
                                       alt="ICON">
                            <span class="cart_quantity">
                                0
                                    </span>
                                    </i>
                                </a>
                            @endif
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Top Header Area =================-->

<!--================Menu Area =================-->
<header class="shop_header_area">
    {{--<div class="container">--}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light nav-menu">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: center">

            <ul class="navbar-nav" style="alignment: center;">
                <li class="nav-item dropdown submenu active">
                    <a class="nav-link dropdown-toggle" href="{{route('home')}}" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        Trang chủ
                    </a>

                </li>
                <li class="nav-item dropdown submenu">
                    <a class="nav-link dropdown-toggle" href="{{route('products')}}" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        Thương hiệu
                    </a>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <span><i class="fa fa-angle-down down_arrow" aria-hidden="true"></i></span></a>
                    <ul class="dropdown-menu">
                        @foreach($loai_sp as $loai)
                            <li class="nav-item"><a class="nav-link"
                                                    href="{{route('producttype', $loai->id)}}">{{$loai->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown submenu">
                    <a class="nav-link dropdown-toggle" href="{{route('donghonam')}}" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        Đồng hồ nam
                    </a>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <span><i class="fa fa-angle-down down_arrow" aria-hidden="true"></i></span></a>
                    <ul class="dropdown-menu">
                        @foreach($loai_sp_nam as $loai)
                            <li class="nav-item"><a class="nav-link"
                                                    href="{{route('loai_donghonam', $loai->id)}}">{{$loai->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown submenu">
                    <a class="nav-link dropdown-toggle" href="{{route('donghonu')}}" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        Đồng hồ nữ
                    </a>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <span><i class="fa fa-angle-down " aria-hidden="true"></i></span></a>
                    <ul class="dropdown-menu">
                        @foreach($loai_sp_nu as $loai)
                            <li class="nav-item"><a class="nav-link"
                                                    href="{{route('loai_donghonu', $loai->id)}}">
                                    {{$loai->name}}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">Giới thiệu</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Liên hệ</a></li>
            </ul>
        </div>
    </nav>
    {{--</div>--}}
</header>
<!--================End Menu Area =================-->
@extends('master')
@section('title')
    Trang chủ
@endsection
@section('content')
    <!--================Home Carousel Area =================-->
    <section class="home_carousel_area">
        <div class="home_carousel_slider owl-carousel">
            @foreach($slide as $sl)
                <div class="item">
                    <div class="h_carousel_item">
                        <img src="public/source/img/slide/{{$sl->image}}" alt="" height="384px" width="660px">
                        <div class="carousel_hover">
                            <h4>{{$sl->name}}</h4>
                            <h3>{{$sl->description}}</h3>
                            <a class="discover_btn" href="{{route('producttype', $sl->id)}}">khám phá
                                ngay</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!--================End Home Carousel Area =================-->

    <!-- Our product -->
    <section class="bgwhite p-t-45 p-b-58">
        <div class="container">
            <div class="sec-title p-b-22">
                <h3 class="m-text5 t-center">
                    SẢN PHẨM MỚI NHẤT
                </h3>
            </div>
            <nav class="tab_filter">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#new_men_watch" role="tab">đồng hồ
                                nam</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#new_women_watch" role="tab">đồng hồ nữ</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Tab panes -->
            <div class="tab-content p-t-35">
                <!-- - -->
                <div class="tab-pane fade show active" id="new_men_watch" role="tabpanel">
                    <div class="row">
                        @foreach($new_men_product as $men)
                            <div class="col-lg-3 col-md-4 col-sm-6 woman bags">
                                <div class="l_product_item">
                                    <div class="l_p_img">
                                        <a href="{{route('detail', $men->id)}}"><img class="img-fluid"
                                                                                     src="public/source/img/product/{{$men->image}}"
                                                                                     alt=""
                                                                                     width="270px"
                                                                                     height="320px"></a>
                                        <div class="new">
                                            <p>New</p>
                                        </div>
                                        @if($men->promotion_price != 0)
                                            <div class="sale">
                                                <p>Sale</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="l_p_text">
                                        <ul>
                                            <li><a class="add_cart_btn" href="{{route('addtocart', $men->id)}}">Thêm
                                                    giỏ
                                                    hàng</a></li>
                                            <li><a class="add_cart_btn" href="{{route('detail', $men->id)}}">Chi
                                                    tiết</a>
                                            </li>
                                        </ul>
                                        <h4>{{$men->name}}</h4>
                                        <h5>@if($men->promotion_price != 0)
                                                $ {{number_format($men->promotion_price)}}
                                                <del>$ {{number_format($men->unit_price)}}</del>
                                            @else
                                                $ {{number_format($men->unit_price)}}
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

                <!-- - -->
                <div class="tab-pane fade" id="new_women_watch" role="tabpanel">
                    <div class="row">
                        @foreach($new_women_product as $women)
                            <div class="col-lg-3 col-md-4 col-sm-6 woman bags">
                                <div class="l_product_item">
                                    <div class="l_p_img">
                                        <a href="{{route('detail', $women->id)}}"><img class="img-fluid"
                                                                                       src="public/source/img/product/{{$women->image}}"
                                                                                       alt=""
                                                                                       width="280px"
                                                                                       height="320px"></a>
                                        <div class="new">
                                            <p>New</p>
                                        </div>
                                        @if($women->promotion_price != 0)
                                            <div class="sale">
                                                <p>Sale</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="l_p_text">
                                        <ul>
                                            <li><a class="add_cart_btn"
                                                   href="{{route('addtocart', $women->id)}}">Thêm
                                                    giỏ
                                                    hàng</a></li>
                                            <li><a class="add_cart_btn" href="{{route('detail', $women->id)}}">Chi
                                                    tiết</a>
                                            </li>
                                        </ul>
                                        <h4>{{$women->name}}</h4>
                                        <h5>@if($women->promotion_price != 0)
                                                $ {{number_format($women->promotion_price)}}
                                                <del>$ {{number_format($women->unit_price)}}</del>
                                            @else
                                                $ {{number_format($women->unit_price)}}
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--================Our Latest Product Area =================-->
    <section class="our_latest_product">
        <div class="container">
            <div class="s_m_title">
                <h2>SẢN PHẨM GIẢM GIÁ</h2>
            </div>
            <div class="l_product_slider owl-carousel">
                @foreach($sale_product as $sale)
                    <div class="item">
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <a href="{{route('detail', $sale->id)}}"><img
                                            src="public/source/img/product/{{$sale->image}}" width="280px"
                                            height="320px" alt=""></a>
                                @if($sale->promotion_price != 0)
                                    <div class="sale">
                                        <p>Sale</p>
                                    </div>
                                @endif
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <li><a class="add_cart_btn" href="{{route('addtocart', $sale->id)}}">Thêm giỏ
                                            hàng</a></li>
                                    {{--<li><a class="add_cart_btn" onclick="addToCart({{$sale->id}})">Thêm giỏ hàng</a></li>--}}
                                    <li><a class="add_cart_btn" href="{{route('detail', $sale->id)}}">Chi tiết</a>
                                    </li>
                                </ul>
                                <h4>{{$sale->name}}</h4>
                                <h5>@if($sale->promotion_price != 0)
                                        $ {{number_format($sale->promotion_price)}}
                                        <del>$ {{number_format($sale->unit_price)}}</del>
                                    @else
                                        $ {{number_format($sale->unit_price)}}
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================End Our Latest Product Area =================-->



    <!--================Featured Product Area =================-->
    <section class="feature_product_area">
        <div class="container">
            <div class="f_p_inner">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="f_product_left">
                            <div class="s_m_title">
                                <h2>Sản phẩm nổi bật</h2>
                            </div>
                            <div class="f_product_inner">
                                @foreach($featured_product as $featured)
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="public/source/img/product/{{$featured->image}}" alt=""
                                                 height="100px" width="70px">
                                        </div>
                                        <div class="media-body">
                                            <h4><a style="color: #0b0b0b;"
                                                   href="{{route('detail', $featured->id)}}">{{$featured->name}}</a>
                                            </h4>
                                            <h5>@if($featured->promotion_price != 0)
                                                    $ {{number_format($featured->promotion_price)}}
                                                @else
                                                    $ {{number_format($featured->unit_price)}}
                                                @endif</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <nav class="tab_filter">
                            <ul class="nav nav-f" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#f_men_watch" role="tab">đồng
                                        hồ nam</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#f_women_watch" role="tab">đồng hồ
                                        nữ</a>
                                </li>
                            </ul>
                        </nav>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- - -->
                            <div class="tab-pane fade show active" id="f_men_watch" role="tabpanel">
                                <div class="fillter_slider owl-carousel">
                                    @foreach($featured_product as $ftp)
                                        <div class="item shoes">
                                            <div class="fillter_product_item bags">
                                                <div class="f_p_img">
                                                    <a href="{{route('detail', $ftp->id)}}"><img
                                                                src="public/source/img/product/{{$ftp->image}}" alt=""
                                                                height="400px" width="295px"></a>
                                                    @if($ftp->promotion_price != 0)
                                                        <div class="sale"><p>Sale</p></div>
                                                    @endif
                                                </div>
                                                <div class="f_p_text">
                                                    <h5><a style="color: #0b0b0b; opacity: 0.8;"
                                                           href="{{route('detail', $ftp->id)}}">{{$ftp->name}}</a></h5>
                                                    <h4>@if($ftp->promotion_price != 0)
                                                            $ {{number_format($ftp->promotion_price)}}
                                                            <del>$ {{number_format($ftp->unit_price)}}</del>
                                                        @else
                                                            $ {{number_format($ftp->unit_price)}}
                                                        @endif
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- - -->
                            <div class="tab-pane fade" id="f_women_watch" role="tabpanel">
                                <div class="fillter_slider owl-carousel">
                                    @foreach($featured_product as $ftp)
                                        <div class="item shoes">
                                            <div class="fillter_product_item bags">
                                                <div class="f_p_img">
                                                    <a href="{{route('detail', $ftp->id)}}"><img
                                                                src="public/source/img/product/{{$ftp->image}}" alt=""
                                                                ></a>
                                                    @if($ftp->promotion_price != 0)
                                                        <div class="sale"><p>Sale</p></div>
                                                    @endif
                                                </div>
                                                <div class="f_p_text">
                                                    <h5><a style="color: #0b0b0b; opacity: 0.8;"
                                                           href="{{route('detail', $ftp->id)}}">{{$ftp->name}}</a></h5>
                                                    <h4>@if($ftp->promotion_price != 0)
                                                            $ {{number_format($ftp->promotion_price)}}
                                                            <del>$ {{number_format($ftp->unit_price)}}</del>
                                                        @else
                                                            $ {{number_format($ftp->unit_price)}}
                                                        @endif
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Featured Product Area =================-->

    <!--================Form Blog Area =================-->
    <section class="from_blog_area">
        <div class="container">
            <div class="from_blog_inner">
                <div class="c_main_title">
                    <h2>REVIEW SẢN PHẨM</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <a style="cursor: pointer;" onclick="alertComeback()">
                            <div class="from_blog_item">
                                <img class="img-fluid" src="public/source/assets/dest/img/blog/from-blog/hublot.jpg"
                                     alt="" height="255px" width="403.333px">
                                <div class="f_blog_text">
                                    <h5>hublot</h5>
                                    <p>Đồng hồ xa xỉ chính hãng Thụy Sĩ</p>
                                    <h6>11.11.2018</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a style="cursor: pointer;" onclick="alertComeback()">
                            <div class="from_blog_item">
                                <img class="img-fluid" src="public/source/assets/dest/img/blog/from-blog/rolex.jpg"
                                     alt="" height="255px" width="403.333px">
                                <div class="f_blog_text">
                                    <h5>rolex</h5>
                                    <p>Đồng hồ xa xỉ chính hãng Thụy Sĩ</p>
                                    <h6>11.11.2018</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a style="cursor: pointer;" onclick="alertComeback()">
                            <div class="from_blog_item">
                                <img class="img-fluid" src="public/source/assets/dest/img/blog/from-blog/tissot.jpg"
                                     alt="" height="255px" width="403.333px">
                                <div class="f_blog_text">
                                    <h5>tissot</h5>
                                    <p>Đồng hồ xa xỉ chính hãng Thụy Sĩ</p>
                                    <h6>11.11.2018</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Form Blog Area =================-->
@endsection
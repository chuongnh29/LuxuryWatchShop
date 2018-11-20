@extends('master')

@section('title')
    Tìm kiếm
@endsection

@section('content')
    <!--================Categories Banner Area =================-->
    <section class="categories_banner_area">
        <div class="container">
            <div class="c_banner_inner">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="current"><a href="#">Tìm kiếm</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->

    <!--================Categories Product Area =================-->
    <section class="categories_product_main p_80">
        <div class="container">
            <div class="categories_main_inner">
                <div class="row row_disable">
                    <div class="col-lg-9 float-md-right">
                        <div class="showing_fillter">
                            <div class="row m0">
                                <div class="first_fillter">
                                    <h4>Tìm thấy {{count($product)}} sản phẩm</h4>
                                </div>
                                <div class="secand_fillter">
                                    <h4>SẮP XẾP THEO:</h4>
                                    <select class="selectpicker">
                                        <option>Giá giảm dần</option>
                                        <option>Giá tăng dần</option>
                                        <option>Tên sản phẩm (từ A - Z)</option>
                                        <option>Tên sản phẩm (từ Z - A)</option>
                                    </select>
                                </div>
                                <div class="third_fillter">
                                </div>
                                <div class="four_fillter">
                                    <h4>HIỂN THỊ:</h4>
                                    <a class="active" href="#"><i class="icon_grid-2x2"></i></a>
                                    <a href="#"><i class="icon_grid-3x3"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="categories_product_area">
                            <div class="row">
                                @foreach($product as $loai)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
                                                <img src="public/source/img/product/{{$loai->image}}" alt=""
                                                     width="270px"
                                                     height="320px">
                                                @if($loai->new = 1)
                                                    <div class="new"><p>New</p></div>
                                                @endif
                                                @if($loai->promotion_price != 0)
                                                    <div class="sale"><p>Sale</p></div>
                                                @endif
                                            </div>
                                            <div class="l_p_text">
                                                <ul>
                                                    <li><a class="add_cart_btn" href="{{route('addtocart', $loai->id)}}">Thêm giỏ hàng</a></li>
                                                    <li><a class="add_cart_btn" href="{{route('detail', $loai->id)}}">Chi
                                                            tiết</a>
                                                    </li>
                                                </ul>
                                                <h4>{{$loai->name}}</h4>
                                                <h5>@if($loai->promotion_price != 0)
                                                        <del>$ {{number_format($loai->unit_price)}}</del>
                                                        $ {{number_format($loai->promotion_price)}}
                                                    @else
                                                        $ {{number_format($loai->unit_price)}}
                                                    @endif
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <nav aria-label="Page navigation example" class="pagination_area">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>

                                    <li class="page-item next"><a class="page-link" href="#"><i
                                                    class="fa fa-angle-right"
                                                    aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 float-md-right">
                        <aside class="l_widgest l_menufacture_widget">
                            <div class="l_w_title">
                                <h3>Thương hiệu</h3>
                            </div>
                            <ul>
                                @foreach($loai_sp as $loai)
                                    <li><a href="{{route('producttype', $loai->name_id)}}">{{$loai->name}}</a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <div class="categories_sidebar">
                            <aside class="l_widgest l_p_categories_widget">
                                <div class="l_w_title">
                                    <h3>Loại dây</h3>
                                </div>
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Dây kim loại
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dây da
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                </ul>
                            </aside>

                            <aside class="l_widgest l_p_categories_widget">
                                <div class="l_w_title">
                                    <h3>Loại vỏ</h3>
                                </div>
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Thép không gỉ
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Mạ vàng
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                </ul>
                            </aside>

                            <aside class="l_widgest l_fillter_widget">
                                <div class="l_w_title">
                                    <h3>Filter section</h3>
                                </div>
                                <div id="slider-range" class="ui_slider"></div>
                                <label for="amount">Price:</label>
                                <input type="text" id="amount" readonly>
                            </aside>

                            <aside class="l_widgest l_feature_widget">
                                <div class="l_w_title">
                                    <h3>Featured Products</h3>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="public/source/img/product/featured-product/f-p-5.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Jeans with <br/> Frayed Hems</h4>
                                        <h5>$45.05</h5>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="public/source/img/product/featured-product/f-p-6.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Crysp Denim<br/>Montana</h4>
                                        <h5>$45.05</h5>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Categories Product Area =================-->

@endsection
@extends('master')

@section('title')
{{$sanpham->name}}
@endsection

@section('content')
    <!--================Categories Banner Area =================-->
    <section class="categories_banner_area">
        <div class="container">
            <div class="c_banner_inner">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><a href="{{route('products')}}">Đồng hồ chính hãng</a></li>
                    <li class="current">{{$sanpham->name}}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->

    <!--================Product Details Area =================-->
    <section class="product_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="product_details_slider">
                        <div id="product_slider" class="rev_slider" data-version="5.3.1.6">
                            <ul>
                                <!-- SLIDE  -->
                                <li data-index="rs-137221490" data-transition="scaledownfrombottom" data-slotamount="7"
                                    data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                                    data-masterspeed="1500"
                                    data-thumb="public/source/img/product/{{$sanpham->image}}"
                                    data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500"
                                    data-fsslotamount="7" data-saveperformance="off" data-title="Ishtar X Tussilago"
                                    data-param1="25/08/2015" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="public/source/img/product/{{$sanpham->image}}" alt=""
                                         data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                         data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->
                                </li>
                                <!-- SLIDE  -->
                                <li data-index="rs-136228343" data-transition="scaledownfrombottom" data-slotamount="7"
                                    data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                                    data-masterspeed="1500"
                                    data-thumb="public/source/img/product/product-details/p-details-tab-2.jpg"
                                    data-rotate="0" data-saveperformance="off" data-title="Los Angeles"
                                    data-param1="13/08/2015" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="public/source/img/product/product-details/p-details-big-1.jpg" alt=""
                                         data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                         data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->
                                </li>
                                <!-- SLIDE  -->
                                <li data-index="rs-135960434" data-transition="scaledownfrombottom" data-slotamount="7"
                                    data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                                    data-masterspeed="1500"
                                    data-thumb="public/source/img/product/product-details/p-details-tab-3.jpg"
                                    data-rotate="0" data-saveperformance="off" data-title="The Colors of Feelings"
                                    data-param1="11/08/2015" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="public/source/img/product/product-details/p-details-big-1.jpg" alt=""
                                         data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                         data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->


                                </li>
                                <!-- SLIDE  -->
                                <li data-index="rs-134008155" data-transition="scaledownfrombottom" data-slotamount="7"
                                    data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                                    data-masterspeed="1500"
                                    data-thumb="public/source/img/product/product-details/p-details-tab-4.jpg"
                                    data-rotate="0" data-saveperformance="off" data-title="Powerful Iceland"
                                    data-param1="20/07/2015" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="public/source/img/product/product-details/p-details-big-1.jpg" alt=""
                                         data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                         data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="product_details_text">
                        <h3>{{$sanpham->name}}</h3>
                        <ul class="p_rating">
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                        <div class="add_review">
                            <a href="#">5 Đánh giá</a>
                            <a href="#">Đánh giá của bạn</a>
                        </div>
                        <h6>Trạng thái <span>Còn hàng</span></h6>
                        <h4>@if($sanpham->promotion_price != 0)
                                $ {{number_format($sanpham->promotion_price)}}
                                <del>$ {{number_format($sanpham->unit_price)}}</del>
                            @else
                                $ {{number_format($sanpham->unit_price)}}
                            @endif
                        </h4>
                        <p>{{$sanpham->description}}</p>

                        <div class="quantity">
                            <div class="custom">
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1) result.value--;return false;"
                                        class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                                       class="input-text qty" disabled>
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count" type="button"><i class="icon_plus"></i></button>
                            </div>
                            <a class="add_cart_btn" href="{{route('addtocart', $sanpham->id)}}">thêm giỏ hàng</a>
                        </div>
                        <div class="shareing_icon">
                            <h5>chia sẻ :</h5>
                            <ul>
                                <li><a href="#"><i class="social_facebook"></i></a></li>
                                <li><a href="#"><i class="social_twitter"></i></a></li>
                                <li><a href="#"><i class="social_pinterest"></i></a></li>
                                <li><a href="#"><i class="social_instagram"></i></a></li>
                                <li><a href="#"><i class="social_youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Details Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <nav class="tab_menu">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">Mô tả sản phẩm</a>
                    <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab"
                       aria-controls="nav-info" aria-selected="false">Thông số kỹ thuật</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">Đánh giá (1)</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                       aria-controls="nav-contact" aria-selected="false">Tags</a>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <p>{{$sanpham->post}}</p>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                        est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                        architecto beatae vitae dicta sunt explicabo. Emo enim ipsam voluptatem quia voluptas sit
                        aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <h4>Rocky Ahmed</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                </div>

                <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                        est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                        architecto beatae vitae dicta sunt explicabo. Emo enim ipsam voluptatem quia voluptas sit
                        aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Details Area =================-->

    <!--================End Related Product Area =================-->
    <section class="related_product_area">
        <div class="container">
            <div class="related_product_inner">
                <h2 class="single_c_title">Sản phẩm liên quan</h2>
                <div class="row">
                    @foreach($sp_tuongtu as $sptt)
                        <div class="col-lg-3 col-sm-6">
                            <div class="l_product_item">
                                <div class="l_p_img">
                                    <img class="img-fluid"
                                         src="public/source/img/product/{{$sptt->image}}"
                                         alt="">
                                </div>
                                <div class="l_p_text">
                                    <ul>
                                        <li><a class="add_cart_btn" href="{{route('addtocart', $sptt->id)}}">Thêm giỏ hàng</a></li>
                                        <li><a class="add_cart_btn" href="{{route('detail', $sptt->id)}}">Chi
                                                tiết</a>
                                        </li>
                                    </ul>
                                    <h4>{{$sptt->name}}</h4>
                                    <h5>@if($sptt->promotion_price != 0)
                                            <del>$ {{number_format($sptt->unit_price)}}</del>
                                            $ {{number_format($sptt->promotion_price)}}
                                        @else
                                            $ {{number_format($sptt->unit_price)}}
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation example" class="pagination_area">
                    <ul class="pagination">
                        {{$sp_tuongtu->links()}}
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!--================End Related Product Area =================-->
@endsection
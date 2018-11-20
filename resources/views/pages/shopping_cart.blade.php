@extends('master')

@section('title')
    Giỏ hàng
@endsection

@section('content')
    <!--================Categories Banner Area =================-->
    <section class="categories_banner_area">
        <div class="container">
            <div class="c_banner_inner">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="current">Giỏ hàng</li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->

    <!--================Shopping Cart Area =================-->
    <section class="shopping_cart_area p_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="cart_product_list">
                        <h3 class="cart_single_title">Giỏ hàng của bạn</h3>
                        <div class="table-responsive-md">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="50%" scope="col" colspan="2">Sản phẩm</th>
                                    <th width="16%" scope="col">Đơn giá</th>
                                    <th width="13%" scope="col">Số lượng</th>
                                    <th width="16%" scope="col">Thành tiền</th>
                                    <th width="5%" scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(Session::has('cart'))
                                    @foreach($product_cart as $cart)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <img src="public/source/img/product/{{$cart['item']['image']}}"
                                                         alt="" width="100px" height="100px">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4>{{$cart['item']['name']}}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><p class="unit-price">@if($cart['item']['promotion_price'] == 0)
                                                        $ {{number_format($cart['item']['unit_price'])}}
                                                    @else
                                                        $ {{number_format($cart['item']['promotion_price'])}}
                                                    @endif</p></td>
                                            <td>
                                                <div class="quantity">
                                                    <div class="custom">
                                                        <button onclick="var result = document.getElementById('sst2'); var sst2 = result.value; if( !isNaN( sst2 ) &amp;&amp; sst2 > 1) result.value--;return false;"
                                                                class="reduced items-count reduced-items" type="button"><i
                                                                    class="icon_minus-06"></i></button>
                                                        <input type="text" name="qty" id="sst2" maxlength="5"
                                                               value="{{$cart['qty']}}"
                                                               title="Quantity:" class="input-text qty" disabled>
                                                        <button onclick="var result = document.getElementById('sst2'); var sst2 = result.value; if( !isNaN( sst2 ) &amp;&amp; sst2 < 5) result.value++;return false;"
                                                                class="increase items-count increase-items" type="button"><i
                                                                    class="icon_plus"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><p class="total">@if($cart['item']['promotion_price'] == 0)
                                                        $ {{number_format($cart['item']['unit_price'] * $cart['qty'])}}
                                                    @else
                                                        $ {{number_format($cart['item']['promotion_price'] * $cart['qty'])}}
                                                    @endif</p></td>
                                            <td scope="row">
                                                <a href="{{route('delcart', $cart['item']['id'])}}">
                                                    <img src="public/source/assets/dest/img/icon/close-icon.png" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr class="last">
                                    <th scope="row">
                                        <img src="public/source/assets/dest/img/icon/cart-icon.png" alt="">
                                    </th>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <h5>Mã giảm giá</h5>
                                            </div>
                                            <div class="media-body">
                                                <input type="text" placeholder="Nhập mã giảm giá">
                                            </div>
                                        </div>
                                    </td>
                                    <td><p class="red"></p></td>
                                    <td colspan="2">
                                        <a href=""><h3>áp dụng mã</h3></a>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="total_amount_area">

                        <div class="cart_totals">
                            <h3 class="cart_single_title">Chi tiết hóa đơn</h3>
                            <div class="cart_total_inner">
                                <ul>
                                    <li><span>Tổng tiền hóa đơn</span><span class="total">
                                            @if(Session::has('cart'))
                                                $ {{number_format($totalPrice)}}
                                            @endif</span>
                                        </li>
                                    <li><span>Vận chuyển</span> Miễn phí</li>
                                    <li><span>Tổng cộng</span><span class="total">
                                            @if(Session::has('cart'))
                                                $ {{number_format($totalPrice)}}
                                            @endif</span></li>
                                </ul>
                            </div>
                            @if(Auth::check())
                                <a href="{{route('checkout')}}">
                                    <button type="submit" class="btn btn-primary checkout_btn">tiến hành thanh toán
                                    </button>
                                </a>
                            @else
                                <a href="{{route('checklogin')}}">
                                    <button class="btn btn-primary checkout_btn">tiến hành thanh toán
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Shopping Cart Area =================-->
@endsection

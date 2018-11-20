@extends('master')
@section('title')
    Giới thiệu
@endsection
@section('content')
    <!--================Categories Banner Area =================-->
    <section class="categories_banner_area">
        <div class="container">
            <div class="c_banner_inner">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="current">Giới thiệu</li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area p_100">
        <div class="container">
            <div class="contact_title">
                <h2>Get in Touch</h2>
                {{--<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur--}}
                {{--magni dolores eos qui.</p>--}}
            </div>
            <div class="row contact_details">
                <div class="col-lg-4 col-md-6">
                    <div class="media">
                        <div class="d-flex">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <p>Detech Building, 8A Tôn Thất Thuyết<br/>Mỹ Đình 2, Nam Từ Liêm, Hà Nội.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="media">
                        <div class="d-flex">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <a href="tel:+1109171234567">+84 988 888 666</a>
                            <a href="tel:+1101911897654">+84 988 666 999</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="media">
                        <div class="d-flex">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <a href="mailto:busines@persuit.com">chuongnhd00645@fpt.edu.vn</a>
                            <a href="mailto:support@persuit.com">tiendxd00674@fpt.edu.vn</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact_form_inner">
                <h3>Để lại một lời nhắn</h3>
                <form class="contact_us_form row" action="contact_process.php" method="post" id="contactForm"
                      novalidate="novalidate">
                    <div class="form-group col-lg-4">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name *">
                    </div>
                    <div class="form-group col-lg-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address *">
                    </div>
                    <div class="form-group col-lg-4">
                        <input type="text" class="form-control" id="website" name="website" placeholder="Your Website">
                    </div>
                    <div class="form-group col-lg-12">
                        <textarea class="form-control" name="message" id="message" rows="1"
                                  placeholder="Type Your Message..."></textarea>
                    </div>
                    <div class="form-group col-lg-12">
                        <button type="submit" value="submit" class="btn update_btn form-control">Gửi tin nhắn</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--================End Contact Area =================-->
@endsection
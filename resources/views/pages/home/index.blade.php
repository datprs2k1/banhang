@extends('layout.layout')

@section('title', 'Trang chủ')

@section('content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 homebanner-holder">

                    <!-- ============================================== INFO BOXES ============================================== -->
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Hoàn tiền</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Hoàn tiền tới 30 ngày</h6>
                                    </div>
                                </div><!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">miễn phí vận chuyển</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Miễn phí vận chuyển đơn hàng từ 150.000đ</h6>
                                    </div>
                                </div><!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Siêu khuyến mãi</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Giảm tới 90% các loại mặt hàng</h6>
                                    </div>
                                </div><!-- .col -->
                            </div><!-- /.row -->
                        </div><!-- /.info-boxes-inner -->
                    </div><!-- /.info-boxes -->
                    <div class="swiper mySwiper scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="swiper-wrapper"
                            style="width: 3760px; left: 0px; transform: translate3d(0px, 0px, 0px); transform-origin: 470px center; perspective-origin: 470px center; transition: all 0ms ease 0s;">
                            <div class="swiper-slide"
                                style="background-image: url(https://ckthemes.com/flipmart/v2/wp-content/uploads/sites/2/2017/04/01-3.jpg);">
                                <h1>Random Text 1</h1>
                            </div>
                            <div class="swiper-slide"
                                style="background-image: url(https://ckthemes.com/flipmart/v2/wp-content/uploads/sites/2/2017/04/01-3.jpg);">
                                <h1>Random Text 2</h1>
                            </div>
                            <div class="swiper-slide"
                                style="background-image: url(https://ckthemes.com/flipmart/v2/wp-content/uploads/sites/2/2017/04/01-3.jpg);">
                                <h1>Random Text 3</h1>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <!-- ============================================== INFO BOXES : END ============================================== -->
                    <!-- ============================================== SCROLL TABS ============================================== -->
                    @foreach ($danh_muc as $item)
                        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                            <div class="more-info-tab clearfix ">
                                <h3 class="new-product-title pull-left">{{ $item->ten_danh_muc }}</h3>
                                <a href="/danhmuc/{{ Str::slug($item->ten_danh_muc) . '_' . $item->id }}">Xem thêm</a>
                            </div>
                            <div class="tab-content outer-top-xs">
                                <div class="tab-pane in active" id="all">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4"
                                            style="opacity: 1; display: block;">
                                            <div class="owl-wrapper-outer">
                                                <div class="owl-wrapper"
                                                    style="width: 100%; left: 0px; display: flex; flex-wrap: wrap; justify-content: flex-start;">
                                                    @foreach ($item->sanpham as $sanpham)
                                                        <div class="owl-item product-wrapper" style="width: 20%;">
                                                            <div class="item item-carousel">
                                                                <div class="products">
                                                                    <div class="product">
                                                                        <div class="product-image">
                                                                            <div class="image">
                                                                                <a
                                                                                    href="/sanpham/{{ Str::slug($sanpham->ten_san_pham) . '_' . $sanpham->id }}">
                                                                                    <img src="{{ asset('images/sanpham/' . $sanpham->hinh_anh) }}"
                                                                                        alt="">
                                                                                </a>
                                                                            </div><!-- /.image -->

                                                                        </div><!-- /.product-image -->
                                                                        <div class="product-info text-center">
                                                                            <h3 class="name">
                                                                                <a
                                                                                    href="/sanpham/{{ $sanpham->hinh_anh }}">
                                                                                    {{ $sanpham->ten_san_pham }}
                                                                                </a>
                                                                            </h3>
                                                                            <div class="product-price">
                                                                                <span class="price">
                                                                                    {{ number_format($sanpham->gia_ban) }}
                                                                                    VND
                                                                                </span>
                                                                            </div><!-- /.product-price -->

                                                                        </div><!-- /.product-info -->
                                                                        <div class="cart clearfix animate-effect">
                                                                            <div class="action">
                                                                                <div id="{{ $sanpham->trang_thai == 'Hết hàng' ? 'out-of-stock' : 'them_gio_hang' }}"
                                                                                    data-id="{{ $sanpham->id }}">
                                                                                    <ul class="list-unstyled">
                                                                                        <li
                                                                                            class="add-cart-button btn-group">
                                                                                            @if ($sanpham->trang_thai == 'Hết hàng')
                                                                                                <button
                                                                                                    data-toggle="tooltip"
                                                                                                    class="btn btn-primary icon"
                                                                                                    type="button"
                                                                                                    title=""
                                                                                                    data-original-title="Hết hàng"
                                                                                                    disabled>
                                                                                                    <i
                                                                                                        class="fa fa-shopping-cart"></i>
                                                                                                    Hết hàng
                                                                                                @else
                                                                                                    <button
                                                                                                        data-toggle="tooltip"
                                                                                                        class="btn btn-primary icon"
                                                                                                        type="button"
                                                                                                        title=""
                                                                                                        data-original-title="Thêm">
                                                                                                        <i
                                                                                                            class="fa fa-shopping-cart"></i>
                                                                                            @endif


                                                                                            </button>
                                                                                        </li>
                                                                                    </ul>
                                                                                    </a>
                                                                                </div><!-- /.action -->
                                                                            </div><!-- /.cart -->
                                                                        </div><!-- /.product -->
                                                                    </div><!-- /.products -->
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div><!-- /.home-owl-carousel -->
                                        </div><!-- /.product-slider -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.scroll-tabs -->
                            <!-- ============================================== SCROLL TABS : END ============================================== -->

                        </div><!-- /.homebanner-holder -->
                    @endforeach

                    <!-- ============================================== CONTENT : END ============================================== -->
                    <!-- ============================================== BRANDS CAROUSEL ============================================== -->

                    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
                </div><!-- /.container -->
            </div><!-- /#top-banner-and-menu -->
        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->

        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 5000
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                }
            });
        })
    </script>
@endsection

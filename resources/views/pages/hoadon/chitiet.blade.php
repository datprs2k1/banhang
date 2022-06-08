@extends('layout.layout')

@section('title')
    Chi tiết hoá đơn
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Shopping Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="container">
        <div class="row">
            <div class="col-md-8 addres-container">
                <div class="address">
                    <h3>Địa chỉ nhận hàng</h3>
                    <p class="nguoinhan"><strong>Người nhận: {{ $chi_tiet[0]->user->name }}</strong></p>
                    <p>Số điện thoại: </p>
                    <p>Email: {{ $chi_tiet[0]->user->email }}</p>
                    <p>Địa chỉ nhận hàng tại: </p>
                    <p>{{ $chi_tiet[0]->tinh->type }} {{ $chi_tiet[0]->tinh->ten }},
                        {{ $chi_tiet[0]->huyen->type }} {{ $chi_tiet[0]->huyen->ten }},
                        {{ $chi_tiet[0]->xa->type }} {{ $chi_tiet[0]->xa->ten }}
                    </p>
                    <p>
                        {{ $chi_tiet[0]->hoadon->dia_chi }}
                    </p>
                </div>
            </div>
            <div class="col-md-4 addres-container tinhtrang">
                <h3>Tình trạng đơn hàng</h3>
                <p>Mã hoá đơn: {{ $chi_tiet[0]->hoadon->id }}</p>
                <p><strong>{{ $chi_tiet[0]->hoadon->trang_thai }}</strong></p>
            </div>
        </div>
    </div>

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-romove item">STT</th>
                                        <th class="cart-description item">Ảnh</th>
                                        <th class="cart-product-name item">Tên sản phẩm</th>
                                        <th class="cart-qty item">Số lượng</th>
                                        <th class="cart-sub-total item">Giá</th>
                                        <th class="cart-total last-item">Tổng</th>
                                    </tr>
                                </thead><!-- /thead -->
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($chi_tiet as $item)
                                        <tr>
                                            <td class="romove-item">{{ $stt++ }}</td>
                                            <td class="cart-image">
                                                <a class="entry-thumbnail"
                                                    href="/sanpham/{{ Str::slug($item->sanPham->ten_san_pham) . '_' . $item->sanPham->id }}">
                                                    <img src="{{ asset('/images/sanpham/' . $item->sanPham->hinh_anh) }}"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'><a
                                                        href=""><b>{{ $item->sanPham->ten_san_pham }}</b></a>
                                                </h4>
                                            </td>
                                            <td class="cart-product-quantity">
                                                <div class="quant-input">
                                                    <h4>{{ $item->so_luong }}</h4>
                                                </div>
                                            </td>
                                            <td class="cart-product-sub-total"><span
                                                    class="cart-sub-total-price">{{ number_format($item->sanPham->gia_ban) }}
                                                    VNĐ</span></td>
                                            <td class="cart-product-grand-total"><span
                                                    class="cart-grand-total-price">{{ number_format($item->sanPham->gia_ban * $item->so_luong) }}
                                                    VNĐ</span></td>
                                        </tr>
                                    @endforeach
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->
                    <div class="col-md-4 col-sm-offset-8 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="cart-grand-total">
                                            Tổng<span class="inner-left-md">{{ $chi_tiet[0]->hoadon->tong_tien }}
                                                VNĐ</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead><!-- /thead -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->
                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item m-t-10">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->

            </div><!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection

@extends('layout.layout')

@section('title')
    Đăng nhập
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Đăng nhập</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Đăng nhập</h4>
                        <p class="">Xin chào, Vui lòng đăng nhập tài khoản của bạn.</p>
                        <form class="register-form outer-top-xs" role="form">
                            <div class="form-group">
                                <label class="info-title" for="email">Email: <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="_email"
                                    name="_email">
                                <div class="invalid-feedback" id="email"></div>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Mật khẩu:</label> <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="_password"
                                    name="_password">
                                <div class="invalid-feedback" id="email"></div>
                            </div>

                            <button class="btn-upper btn btn-primary checkout-page-button" name="btn-dangnhap"
                                id="btn-dangnhap">Đăng nhập</button>
                        </form>
                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Đăng ký</h4>
                        <p class="text title-tag-line">Tạo tài khoản mới của bạn.</p>
                        <form class="register-form outer-top-xs" role="form">
                            <div class="form-group">
                                <label class="info-title" for="name">Họ tên <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="name"
                                    name="name">
                                <div class="invalid-feedback" id="email"></div>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Email <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email"
                                    name="email">
                                <div class="invalid-feedback" id="email"></div>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Mật khẩu <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" id="password"
                                    name="password">
                                <div class="invalid-feedback" id="email"></div>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Xác nhận lại mật khẩu
                                    <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    id="password_confirmation" name="password_confirmation">
                                <div class="invalid-feedback" id="email"></div>
                            </div>
                            <button class="btn-upper btn btn-primary checkout-page-button" name="btn-dangky"
                                id="btn-dangky">Đăng
                                ký</button>
                        </form>


                    </div>
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->

        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection

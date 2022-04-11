<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->

    <body class="cnt-home">
        <!-- ============================================== HEADER ============================================== -->
        <header class="header-style-1">

            <!-- ============================================== TOP MENU ============================================== -->
            <div class="top-bar animate-dropdown">
                <div class="container">
                    <div class="header-top-inner">
                        <div class="cnt-account">
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="icon fa fa-shopping-cart"></i>Giỏ hàng</a>
                                </li>
                                <li><a href="#"><i class="icon fa fa-check"></i>Thanh toán</a></li>
                                <li><a href="#"><i class="icon fa fa-lock"></i>Đăng nhập</a></li>
                            </ul>
                        </div><!-- /.cnt-account -->


                        <div class="clearfix"></div>
                    </div><!-- /.header-top-inner -->
                </div><!-- /.container -->
            </div><!-- /.header-top -->
            <!-- ============================================== TOP MENU : END ============================================== -->
            <div class="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-1 logo-holder">
                            <!-- ============================================================= LOGO ============================================================= -->
                            <div class="logo">
                                <a href="#">

                                    <img src="{{ asset('images/shop-icon-png-6.jpg') }}" alt="" width="70%">

                                </a>
                            </div><!-- /.logo -->
                            <!-- ============================================================= LOGO : END ============================================================= -->
                        </div><!-- /.logo-holder -->

                        <div class="col-xs-12 col-sm-12 col-md-9 top-search-holder">
                            <!-- /.contact-row -->
                            <!-- ============================================================= SEARCH AREA ============================================================= -->
                            <div class="search-area">
                                <form method="POST" action="">
                                    <div class="control-group">

                                        <ul class="categories-filter animate-dropdown">
                                            <li class="dropdown">

                                                <a class="dropdown-toggle" data-toggle="dropdown"
                                                    href="category.html">Tìm kiếm</a>
                                            </li>
                                        </ul>

                                        <input class="search-field" name="timkiem"
                                            placeholder="Nhập tên sản phẩm để tìm kiếm..." />
                                        <button type="submit" name="search-btn" class="search-button"
                                            href="#"></button>

                                    </div>
                                </form>
                            </div><!-- /.search-area -->
                            <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                        </div><!-- /.top-search-holder -->

                        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row" padding-right="0">
                            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                            <div class="dropdown dropdown-cart ">
                                <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                                    <div class="items-cart-inner">
                                        <div class="basket">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                        <div class="basket-item-count"><span class="count">0</span>
                                        </div>
                                        <div class="total-price-basket">
                                            <span class="lbl">Giỏ hàng</span>
                                        </div>


                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="cart-item product-summary">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="image">
                                                        <a href="#"><img src="" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-7">

                                                    <h3 class="name">
                                                        <a href="">
                                                            A <br>x 4
                                                        </a>
                                                    </h3>
                                                    <div class="price">
                                                        10</div>
                                                </div>
                                                <div class="col-xs-1 action">
                                                    <a href="#"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div><!-- /.cart-item -->
                                        <div class="clearfix"></div>
                                        <hr>

                                        <div class="clearfix cart-total">
                                            <div class="pull-right">

                                                <span class="text">Tổng :</span>10 VNĐ
                                                </span>

                                            </div>
                                            <div class="clearfix"></div>

                                            <a href="#" class="btn btn-upper btn-primary btn-block m-t-20">Thanh
                                                toán</a>
                                        </div><!-- /.cart-total-->


                                    </li>
                                </ul><!-- /.dropdown-menu-->
                            </div><!-- /.dropdown-cart -->

                            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                        </div><!-- /.top-cart-row -->
                    </div><!-- /.row -->

                </div><!-- /.container -->

            </div><!-- /.main-header -->

            <!-- ============================================== NAVBAR ============================================== -->
            <div class="header-nav animate-dropdown">
                <div class="container">
                    <div class="yamm navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                                class="navbar-toggle collapsed" type="button">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="nav-bg-class">
                            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                                <div class="nav-outer">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown yamm-fw">
                                            <a href="#">Home</a>
                                        </li>

                                        @foreach ($danh_muc as $item)
                                            <li class="dropdown yamm-fw">
                                                <a href="#">{{ $item->ten_danh_muc }}</a>
                                            </li>
                                        @endforeach
                                    </ul><!-- /.navbar-nav -->
                                    <div class="clearfix"></div>
                                </div><!-- /.nav-outer -->
                            </div><!-- /.navbar-collapse -->


                        </div><!-- /.nav-bg-class -->
                    </div><!-- /.navbar-default -->
                </div><!-- /.container-class -->

            </div><!-- /.header-nav -->
            <!-- ============================================== NAVBAR : END ============================================== -->

        </header>

</div>

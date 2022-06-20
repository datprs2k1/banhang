@extends('layout.layout')

@section('title')
    {{ $danh_muc->ten_danh_muc }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>{{ $danh_muc->ten_danh_muc }}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>

                <div class='col-md-12'>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row"
                                        style="display: flex; flex-wrap: wrap; justify-content: flex-start;">

                                        @foreach ($danh_muc->sanPham as $san_pham)
                                            <div class="col-sm-6 col-md-3 wow fadeInUp">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a
                                                                    href="/sanpham/{{ Str::slug($san_pham->ten_san_pham) . '_' . $san_pham->id }}"><img
                                                                        src="{{ asset('images/sanpham/' . $san_pham->hinh_anh) }}"
                                                                        alt="" class="images"></a>
                                                            </div><!-- /.image -->
                                                        </div><!-- /.product-image -->
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="">{{ $san_pham->ten_san_pham }}</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>

                                                            <div class="product-price">
                                                                <span class="price">
                                                                    {{ number_format($san_pham->gia_ban) }}
                                                                    VND
                                                                </span>

                                                            </div><!-- /.product-price -->

                                                        </div><!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect cart_danhmuc">
                                                            <div class="action">
                                                                <div id="them_gio_hang" data-id="{{ $san_pham->id }}">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button data-toggle="tooltip"
                                                                                class="btn btn-primary icon" type="button"
                                                                                title="" data-original-title="Thêm">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                        </li>
                                                                    </ul>
                                                                    </a>
                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->
                                                        </div><!-- /.product -->
                                                    </div>
                                                </div><!-- /.products -->
                                            </div><!-- /.item -->
                                        @endforeach


                                    </div><!-- /.row -->
                                </div><!-- /.category-product -->

                            </div><!-- /.tab-pane -->

                        </div><!-- /.tab-content -->

                        <div class="clearfix filters-container">

                            <div class="text-right">
                                <div class="pagination-container">
                                    {{ $danh_muc->sanPham->links() }}
                                </div><!-- /.pagination-container -->
                            </div><!-- /.text-right -->

                        </div><!-- /.filters-container -->


                    </div><!-- /.search-result-container -->

                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->

            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->

    </div><!-- /.body-content -->
    <style>
        .images {
            min-height: 250px;
            object-fit: contain;
        }
    </style>
@endsection

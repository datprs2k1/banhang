@extends('layout.layout')

@section('title')
    Giỏ hàng
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

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive" id="cart">
                            @if (count($gio_hang) == 0)
                                <div class="col-md-12">
                                    <h3 class="cart-empty-tittle">Giỏ hàng trống! Tiếp tục mua hàng thôi nào!!!</h3>
                                    <div class="img-cart-wrapper">
                                        <img src="{{ asset('images/empty-cart.png') }}" alt="">
                                    </div>
                                </div>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-romove item">Xoá</th>
                                            <th class="cart-description item">Ảnh</th>
                                            <th class="cart-product-name item">Tên sản phẩm</th>
                                            <th class="cart-qty item">Số lượng</th>
                                            <th>Đơn vị</th>
                                            <th class="cart-sub-total item">Giá</th>
                                            <th class="cart-total last-item">Tổng</th>
                                        </tr>
                                    </thead><!-- /thead -->
                                    <tbody id="danh_sach_gio_hang">
                                        @foreach ($gio_hang as $item)
                                            <tr data-id="{{ $item->sanPham->id }}">
                                                <td class="remove-item">
                                                    <div title="Xoá" class="icon"><i class="fa fa-trash"
                                                            data-id="{{ $item->id }}" id="xoa_gio_hang"></i>
                                                    </div>
                                                </td>
                                                <td class="cart-image">
                                                    <a class="entry-thumbnail" href="">
                                                        <img src="{{ asset('images/sanpham/' . $item->sanPham->hinh_anh) }}"
                                                            alt="">
                                                    </a>
                                                </td>
                                                <td class="cart-product-name-info">
                                                    <h4 class='cart-product-description'
                                                        data-id="{{ $item->sanPham->id }}"
                                                        id="
                                                                                                                                                                                                                                            item_gio_hang">
                                                        <a href=""><b>{{ $item->sanPham->ten_san_pham }}</b></a>
                                                    </h4>
                                                </td>
                                                <td class="cart-product-quantity">
                                                    <div class="quant-input">

                                                        <input type="number" name="" id="so_luong"
                                                            data-id="{{ $item->id }}" value="{{ $item->so_luong }}"
                                                            min="1">
                                                    </div>
                                                </td>
                                                <td>2</td>
                                                <td class="cart-product-sub-total"><span
                                                        class="cart-sub-total-price">{{ number_format($item->sanPham->gia_ban, 0, ',', '.') }}</span>
                                                </td>
                                                <td class="cart-product-grand-total"><span class="cart-grand-total-price"
                                                        id="tong_tien_{{ $item->id }}">{{ number_format($item->sanPham->gia_ban * $item->so_luong, 0, ',', '.') }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody><!-- /tbody -->
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <div class="shopping-cart-btn">
                                                    <span class="">
                                                        <a href="javascript:history.go(-1)"
                                                            class="btn btn-upper btn-primary pull-right outer-right-xs">Tiếp
                                                            tục mua</a>
                                                    </span>
                                                </div><!-- /.shopping-cart-btn -->
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table><!-- /table -->
                                <div class="row">
                                    <div class="col-md-8 address-form" style="height: 300px">
                                        <h5>Vui lòng chọn địa chỉ giao hàng.</h5>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="ten_nguoi_nhan">Tên người nhận: </label>
                                                    <input type="text" class="form-control" name="ten_nguoi_nhan"
                                                        id="ten_nguoi_nhan" placeholder="Nguyen Văn A">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="so_dien_thoai">Số điện thoại: </label>
                                                    <input type="number" class="form-control" name="so_dien_thoai"
                                                        id="so_dien_thoai" maxlength="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="tinh">Tỉnh</label>
                                                <select id="tinh" class="form-control" name="tinh">
                                                    <option selected>Chọn tỉnh.</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="huyen">Huyện</label>
                                                <select id="huyen" class="form-control" name="huyen">
                                                    <option selected>Chọn huyện.</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="xa">Xã</label>
                                                <select id="xa" class="form-control" name="xa">
                                                    <option selected>Chọn xã.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="xa-phuong:">Địa chỉ nhận mong muốn: </label>
                                            <input type="text" class="form-control" name="diachi" id="diachi"
                                                placeholder="VD: số nhà 3 ...">
                                        </div>
                                        <div class="form-group">
                                            <label for="thanhtoan">Phương thức thanh toán</label>
                                            <select id="thanhtoan" class="form-control" name="thanhtoan">
                                                <option value="Chuyển khoản">Chuyển khoản</option>
                                                <option value="Tiền mặt">Tiền mặt</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 cart-shopping-total" style="height: 300px">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="cart-grand-total">
                                                            Tổng<span class="inner-left-md" id="tong_tien_a"></span>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead><!-- /thead -->
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="cart-checkout-btn pull-right">
                                                            <button type="submit" class="btn btn-primary checkout-btn"
                                                                id="dat_hang">Đặt
                                                                hàng</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody><!-- /tbody -->
                                        </table><!-- /table -->
                                    </div>
                            @endif
                        </div>
                    </div><!-- /.shopping-cart-table -->
                </div><!-- /.cart-shopping-total -->
            </div><!-- /.shopping-cart -->
        </div> <!-- /.row -->
    </div>
    </div>
    </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            const getTinh = () => {
                $.ajax({
                    url: window.location.protocol + '//' + window.location.host + '/giohang/tinh',
                    type: "GET",
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#tinh').append(
                                `<option value="${value.id}">${value.ten}</option>`);
                        });
                    }
                });
            };
            $('#tinh').on('change', function() {
                let tinh = $(this).val() < 10 ? '0' + $(this).val() : $(this).val();
                $.ajax({
                    url: window.location.protocol + '//' + window.location.host +
                        '/giohang/huyen/' + tinh,
                    type: "GET",
                    success: function(data) {
                        $('#huyen').empty();
                        $('#xa').empty();
                        $('#huyen').append(
                            `<option selected>Chọn huyện.</option>`);
                        $('#xa').append(
                            `<option selected>Chọn xã.</option>`);
                        $.each(data, function(key, value) {
                            $('#huyen').append(
                                `<option value="${value.id}">${value.ten}</option>`);
                        });
                    }
                });
            });
            $('#huyen').on('change', function() {
                let huyen = $(this).val() < 10 ? '00' + $(this).val() : $(this).val() < 100 ? '0' + $(this)
                    .val() : $(this).val();
                $.ajax({
                    url: window.location.protocol + '//' + window.location.host +
                        '/giohang/xa/' + huyen,
                    type: "GET",
                    success: function(data) {
                        $('#xa').empty();
                        $('#xa').append(
                            `<option selected>Chọn xã.</option>`);
                        $.each(data, function(key, value) {
                            $('#xa').append(
                                `<option value="${value.id}">${value.ten}</option>`);
                        });
                    }
                });
            });

            getTinh();

            $('#dat_hang').on('click', function() {
                let tinh = $('#tinh').val() < 10 ? '0' + $('#tinh').val() : $('#tinh').val();
                let huyen = $('#huyen').val() < 10 ? '00' + $('#huyen').val() : $('#huyen').val() < 100 ?
                    '0' +
                    $('#huyen').val() : $('#huyen').val();
                let xa = $('#xa').val() < 10 ? '00' + $('#xa').val() : $('#xa').val() < 100 ? '0' + $('#xa')
                    .val() : $('#xa').val();
                let diachi = $('#diachi').val();
                let thanhtoan = $('#thanhtoan').val();
                let ten_nguoi_nhan = $('#ten_nguoi_nhan').val();
                let so_dien_thoai = $('#so_dien_thoai').val();

                $.ajax({
                    url: window.location.protocol + '//' + window.location.host +
                        '/hoadon',
                    type: "POST",
                    data: {
                        id_tinh: tinh,
                        id_huyen: huyen,
                        id_xa: xa,
                        dia_chi: diachi,
                        thanh_toan: thanhtoan,
                        ten_nguoi_nhan: ten_nguoi_nhan,
                        so_dien_thoai: so_dien_thoai,
                    },
                    success: function(data) {
                        swal({
                                title: 'Đặt hàng thành công',
                                text: 'Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất',
                                type: 'success',
                                confirmButtonText: 'OK'
                            })
                            .then(function() {
                                window.location.href = window.location.protocol + '//' +
                                    window.location.host +
                                    '/hoadon/';
                            });
                    },
                    error: function(data) {
                        swal({
                            title: 'Đặt hàng thất bại',
                            text: 'Vui lòng kiểm tra lại thông tin',
                            type: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });

            });
        });
    </script>
@endsection

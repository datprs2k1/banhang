@extends('admin.layout.layout')

@section('title')
    Danh sách nhà cung cấp
@endsection

@section('header')
    <x-admin-header />
@endsection

@section('content')
    <div class="content-wrapper">

        <x-breadcrumb />

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách</h3>
                            </div>

                            <div class="card-body">
                                <div class="mt-3 mb-3 row">
                                    <div class="col">
                                        <button class="btn-primary btn me-5" data-toggle="modal" id="btn-them">
                                            Thêm
                                        </button>
                                    </div>
                                </div>
                                <table id="danhsach" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Mô tả</th>
                                            <th>Hướng dẫn sử dụng</th>
                                            <th>Giá bán</th>
                                            <th>Số lượng</th>
                                            <th>Nhà cung cấp</th>
                                            <th>Danh mục</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-them">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ten_san_pham">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham"
                                    placeholder="Nhập tên nhà cung cấp">
                                <div class="invalid-feedback" id="ten_san_pham"></div>
                            </div>
                            <div class="form-group">
                                <label for="mo_ta">Mô tả</label>
                                <textarea class="form-control" rows="6" id="mo_ta" name="mo_ta" placeholder="Nhập giới thiệu"></textarea>
                                <div class="invalid-feedback" id="mo_ta"></div>
                            </div>
                            <div class="form-group">
                                <label for="huong_dan_su_dung">Hướng dẫn sử dụng</label>
                                <textarea class="form-control" rows="6" id="huong_dan_su_dung" name="huong_dan_su_dung"
                                    placeholder="Nhập giới thiệu"></textarea>
                                <div class="invalid-feedback" id="huong_dan_su_dung"></div>
                            </div>
                            <div class="form-group">
                                <label for="gia_ban">Giá bán</label>
                                <input type="number" class="form-control" id="gia_ban" name="gia_ban"
                                    placeholder="Nhập địa chỉ">
                                <div class="invalid-feedback" id="gia_ban"></div>
                            </div>
                            <div class="form-group">
                                <label for="so_luong">Số lượng</label>
                                <input type="number" class="form-control" id="so_luong" name="so_luong"
                                    placeholder="Nhập địa chỉ">
                                <div class="invalid-feedback" id="so_luong"></div>
                            </div>
                            <div class="form-group">
                                <label for="don_vi_tinh">Đơn vị tính</label>
                                <select class="custom-select form-control-border" id="don_vi_tinh">
                                    <option value="Chiếc">Chiếc</option>
                                    <option value="Cái">Cái</option>
                                    <option value="Lon">Lon</option>
                                </select>
                                <div class="invalid-feedback" id="don_vi_tinh"></div>
                            </div>

                            <div class="form-group">
                                <label for="id_nha_cung_cap">Nhà cung cấp</label>
                                <select class="custom-select form-control-border" id="id_nha_cung_cap">

                                </select>
                                <div class="invalid-feedback" id="id_nha_cung_cap"></div>
                            </div>

                            <div class="form-group">
                                <label for="id_danh_muc">Danh mục</label>
                                <select class="custom-select form-control-border" id="id_danh_muc">
                                </select>
                                <div class="invalid-feedback" id="id_danh_muc"></div>
                            </div>

                            <div class="form-group">
                                <label for="hinh_anh">Hình ảnh</label>
                                <div class="input-group">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" name="hinh_anh" id="hinh_anh">
                                        <label class="custom-file-label" for="hinh_anh">Chọn file</label>
                                        <div class="invalid-feedback" id="hinh_anh"></div>
                                    </div>
                                    <img src="" alt="" id="img-hinh-anh" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn_close" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="them_san_pham">Thêm</button>
                </div>
            </div>

        </div>

    </div>
    <div class="modal fade" id="modal-sua">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa nhà cung cấp</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card-body">
                            <div class="form-group">

                                <input type="hidden" name="id">
                                <label for="_ten_san_pham">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="_ten_san_pham" name="_ten_san_pham"
                                    placeholder="Nhập tên nhà cung cấp">
                                <div class="invalid-feedback" id="_ten_san_pham"></div>
                            </div>
                            <div class="form-group">
                                <label for="_mo_ta">Mô tả</label>
                                <textarea class="form-control" rows="6" id="_mo_ta" name="_mo_ta" placeholder="Nhập giới thiệu"></textarea>
                                <div class="invalid-feedback" id="_mo_ta"></div>
                            </div>
                            <div class="form-group">
                                <label for="_huong_dan_su_dung">Hướng dẫn sử dụng</label>
                                <textarea class="form-control" rows="6" id="_huong_dan_su_dung" name="_huong_dan_su_dung"
                                    placeholder="Nhập giới thiệu"></textarea>
                                <div class="invalid-feedback" id="_huong_dan_su_dung"></div>
                            </div>
                            <div class="form-group">
                                <label for="_gia_ban">Giá bán</label>
                                <input type="number" class="form-control" id="_gia_ban" name="_gia_ban"
                                    placeholder="Nhập địa chỉ">
                                <div class="invalid-feedback" id="_gia_ban"></div>
                            </div>
                            <div class="form-group">
                                <label for="_so_luong">Số lượng</label>
                                <input type="number" class="form-control" id="_so_luong" name="_so_luong"
                                    placeholder="Nhập địa chỉ">
                                <div class="invalid-feedback" id="_so_luong"></div>
                            </div>
                            <div class="form-group">
                                <label for="_don_vi_tinh">Đơn vị tính</label>
                                <select class="custom-select form-control-border" id="_don_vi_tinh">
                                    <option value="Chiếc">Chiếc</option>
                                    <option value="Cái">Cái</option>
                                    <option value="Lon">Lon</option>
                                </select>
                                <div class="invalid-feedback" id="_don_vi_tinh"></div>
                            </div>

                            <div class="form-group">
                                <label for="_id_nha_cung_cap">Nhà cung cấp</label>
                                <select class="custom-select form-control-border" id="_id_nha_cung_cap">

                                </select>
                                <div class="invalid-feedback" id="_id_nha_cung_cap"></div>
                            </div>

                            <div class="form-group">
                                <label for="_id_danh_muc">Danh mục</label>
                                <select class="custom-select form-control-border" id="_id_danh_muc">
                                </select>
                                <div class="invalid-feedback" id="_id_danh_muc"></div>
                            </div>

                            <div class="form-group">
                                <label for="_hinh_anh">Hình ảnh</label>
                                <div class="input-group">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" name="_hinh_anh" id="_hinh_anh">
                                        <label class="custom-file-label" for="_hinh_anh">Chọn file</label>
                                        <div class="invalid-feedback" id="_hinh_anh"></div>
                                    </div>
                                    <img src="" alt="" id="_img-hinh-anh" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn_close" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="sua_san_pham">Sửa</button>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();

            $('#danhsach').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('sanpham.danhsach') !!}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'hinh_anh',
                        name: 'hinh_anh',
                    },
                    {
                        data: 'ten_san_pham',
                        name: 'ten_san_pham'
                    },
                    {
                        data: 'mo_ta',
                        name: 'mo_ta'
                    },
                    {
                        data: 'huong_dan_su_dung',
                        name: 'huong_dan_su_dung'
                    },
                    {
                        data: 'gia_ban',
                        name: 'gia_ban'
                    },
                    {
                        data: 'so_luong',
                        name: 'so_luong'
                    },
                    {
                        data: 'nha_cung_cap.ten_nha_cung_cap',
                        name: 'nha_cung_cap.ten_nha_cung_cap'
                    },
                    {
                        data: 'danh_muc.ten_danh_muc',
                        name: 'danh_muc.ten_danh_muc'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ],
                "columnDefs": [{
                        "targets": 1,
                        "data": "description",
                        "render": function(data, type, row, meta) {
                            return '<img src="/images/' + data +
                                '" width="100px" height="100px">';
                        },
                    },
                    {
                        className: "align-middle",
                        targets: "_all"
                    },
                ],
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "pageLength": 10
            });

            $(document).on('click', '.sua_san_pham', function(e) {
                let id = $(this).data('id');

                $.ajax({
                    url: '/admin/sanpham/' + id,
                    type: 'GET',
                    success: function(data) {
                        $('input[name="id"]').val(data.id);
                        $('#_ten_san_pham').val(data.ten_san_pham);
                        $('#_mo_ta').val(data.mo_ta);
                        $('#_huong_dan_su_dung').val(data.huong_dan_su_dung);
                        $('#_gia_ban').val(data.gia_ban);
                        $('#_so_luong').val(data.so_luong);
                        $('#_don_vi_tinh').val(data.don_vi_tinh);
                        $('#_id_nha_cung_cap').val(data.id_nha_cung_cap);
                        $('#_id_danh_muc').val(data.id_danh_muc);
                        $('#_img-hinh-anh').attr('src', '/images/' + data.hinh_anh);
                        $('#sua_san_pham').attr('data-id', data.id);
                        $('#sua_san_pham').attr('data-url', '/admin/sanpham/' + data.id);
                        $('#sua_san_pham').attr('data-method', 'PUT');
                        $('#sua_san_pham').text('Sửa');
                        $('#modal-sua').modal('show');
                    }
                });
            });

            var file;

            $('input[name="hinh_anh"]').on('change', function(e) {
                file = e.target.files[0];

                let src = window.URL.createObjectURL(file);
                $('#img-hinh-anh').attr('src', src);

            });

            $('input[name="_hinh_anh"]').on('change', function(e) {
                file = e.target.files[0];

                let src = window.URL.createObjectURL(file);
                $('#_img-hinh-anh').attr('src', src);

            });

            $.ajax({
                url: '/admin/nhacungcap/danhsach',
                type: 'GET',
                success: function(data) {
                    $.each(data.data, function(key, value) {
                        $('#id_nha_cung_cap').append(
                            '<option value="' + value.id + '">' + value.ten_nha_cung_cap +
                            '</option>'
                        );
                        $('#_id_nha_cung_cap').append(
                            '<option value="' + value.id + '">' + value.ten_nha_cung_cap +
                            '</option>'
                        );
                    });
                }
            });

            $.ajax({
                url: '/admin/danhmuc/danhsach',
                type: 'GET',
                success: function(data) {
                    $.each(data.data, function(key, value) {
                        $('#id_danh_muc').append(
                            '<option value="' + value.id + '">' + value.ten_danh_muc +
                            '</option>'
                        );
                        $('#_id_danh_muc').append(
                            '<option value="' + value.id + '">' + value.ten_danh_muc +
                            '</option>'
                        );
                    });
                }
            });
        });
    </script>
    <script src="https://adminlte.io/themes/v3/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
@endsection

@section('footer')
    <x-admin-footer />
@endsection

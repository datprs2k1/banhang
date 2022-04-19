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
                                            <th>#</th>
                                            <th>Logo</th>
                                            <th>Tên danh mục</th>
                                            <th>Giới thiệu</th>
                                            <th>Địa chỉ</th>
                                            <th>Số điện thoại</th>
                                            <th>Email</th>
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
                    <h4 class="modal-title">Thêm nhà cung cấp</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ten_nha_cung_cap">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" id="ten_nha_cung_cap" name="ten_nha_cung_cap"
                                    placeholder="Nhập tên nhà cung cấp">
                                <div class="invalid-feedback" id="ten_nha_cung_cap"></div>
                            </div>
                            <div class="form-group">
                                <label for="gioi_thieu">Giới thiệu</label>
                                <textarea class="form-control" rows="6" id="gioi_thieu" name="gioi_thieu" placeholder="Nhập giới thiệu"></textarea>
                                <div class="invalid-feedback" id="gioi_thieu"></div>
                            </div>
                            <div class="form-group">
                                <label for="dia_chi">Địa chỉ</label>
                                <input type="text" class="form-control" id="dia_chi" name="dia_chi"
                                    placeholder="Nhập địa chỉ">
                                <div class="invalid-feedback" id="dia_chi"></div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    placeholder="Nhập số điện thoại">
                                <div class="invalid-feedback" id="phone"></div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
                                <div class="invalid-feedback" id="email"></div>
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website"
                                    placeholder="Nhập website">
                                <div class="invalid-feedback" id="website"></div>
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <div class="input-group">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" name="logo" id="logo">
                                        <label class="custom-file-label" for="logo">Chọn file</label>
                                        <div class="invalid-feedback" id="logo"></div>
                                    </div>
                                    <img src="" alt="" id="img-logo" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="them_nha_cung_cap">Thêm</button>
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
                                <label for="_ten_nha_cung_cap">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" id="_ten_nha_cung_cap" name="_ten_nha_cung_cap"
                                    placeholder="Nhập tên nhà cung cấp">
                                <div class="invalid-feedback" id="_ten_nha_cung_cap"></div>
                            </div>
                            <div class="form-group">
                                <label for="_gioi_thieu">Giới thiệu</label>
                                <textarea class="form-control" id="_gioi_thieu" name="_gioi_thieu" placeholder="Nhập giới thiệu"> </textarea>
                                <div class="invalid-feedback" id="_gioi_thieu"></div>
                            </div>
                            <div class="form-group">
                                <label for="_dia_chi">Địa chỉ</label>
                                <input type="text" class="form-control" id="_dia_chi" name="_dia_chi"
                                    placeholder="Nhập địa chỉ">
                                <div class="invalid-feedback" id="_dia_chi"></div>
                            </div>
                            <div class="form-group">
                                <label for="_phone">Số điện thoại</label>
                                <input type="number" class="form-control" id="_phone" name="_phone"
                                    placeholder="Nhập số điện thoại">
                                <div class="invalid-feedback" id="_phone"></div>
                            </div>
                            <div class="form-group">
                                <label for="_email">Email</label>
                                <input type="_email" class="form-control" id="_email" name="_email"
                                    placeholder="Nhập email">
                                <div class="invalid-feedback" id="_email"></div>
                            </div>
                            <div class="form-group">
                                <label for="_website">Website</label>
                                <input type="text" class="form-control" id="_website" name="_website"
                                    placeholder="Nhập website">
                                <div class="invalid-feedback" id="_website"></div>
                            </div>
                            <div class="form-group">
                                <label for="_logo">Logo</label>
                                <div class="input-group">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" name="_logo" id="_logo">
                                        <label class="custom-file-label" for="_logo">Chọn file</label>
                                        <div class="invalid-feedback" id="_logo"></div>
                                    </div>
                                    <img src="" alt="" id="_img-logo" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn_close" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="sua_nha_cung_cap">Sửa</button>
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
                ajax: '{!! route('nhacungcap.danhsach') !!}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'logo',
                        name: 'logo',
                    },
                    {
                        data: 'ten_nha_cung_cap',
                        name: 'ten_nha_cung_cap'
                    },
                    {
                        data: 'gioi_thieu',
                        name: 'gioi_thieu'
                    },
                    {
                        data: 'dia_chi',
                        name: 'dia_chi'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'email',
                        name: 'email'
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

            $(document).on('click', '.sua_nha_cung_cap', function(e) {
                let id = $(this).data('id');

                $.ajax({
                    url: '/admin/nhacungcap/' + id,
                    type: 'GET',
                    success: function(data) {
                        $('input[name="id"]').val(data.id);
                        $('input[name="_ten_nha_cung_cap"]').val(data.ten_nha_cung_cap);
                        $('textarea[name="_gioi_thieu"]').val(data.gioi_thieu);
                        $('input[name="_dia_chi"]').val(data.dia_chi);
                        $('input[name="_phone"]').val(data.phone);
                        $('input[name="_email"]').val(data.email);
                        $('input[name="_website"]').val(data.website);
                        $('#_img-logo').attr('src', '/images/' + data.logo);
                        $('#modal-sua').modal('show');
                    }
                });
            });

            $('.btn_close').click(function(e) {
                $('#modal-sua').modal('hide');
            });

            $('#btn-them').click(function(e) {
                $('#modal-them').modal('show');
            });

        });
    </script>
    <script src="https://adminlte.io/themes/v3/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
@endsection

@section('footer')
    <x-admin-footer />
@endsection

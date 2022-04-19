@extends('admin.layout.layout')

@section('title')
    Danh sách danh mục
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
                                            <th>Tên danh mục</th>
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
                    <h4 class="modal-title">Thêm danh mục</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="ten_danh_muc">Tên danh mục</label>
                                <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc"
                                    placeholder="Nhập tên danh mục">
                                <div class="invalid-feedback" id="ten_danh_muc"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="them_danh_muc">Thêm</button>
                </div>
            </div>

        </div>

    </div>
    <div class="modal fade" id="modal-sua">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa danh mục</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card-body">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label for="_ten_danh_muc">Tên danh mục</label>
                                <input type="text" class="form-control" id="_ten_danh_muc" name="_ten_danh_muc"
                                    placeholder="Nhập tên danh mục">
                                <div class="invalid-feedback" id="_ten_danh_muc"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn_close" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="sua_danh_muc">Thêm</button>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#danhsach').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('danhmuc.danhsach') !!}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'ten_danh_muc',
                        name: 'ten_danh_muc'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
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

            $(document).on('click', '.sua_danh_muc', function(e) {
                let id = $(this).data('id');

                $.ajax({
                    url: '/admin/danhmuc/' + id,
                    type: 'GET',
                    success: function(data) {
                        $('input[name="id"]').val(data.id);
                        $('#_ten_danh_muc').val(data.ten_danh_muc);
                        $('#modal-sua').modal('show');
                    }
                });
            });

            $('.btn_close').click(function(e) {
                $('#modal-sua').modal('hide');
            });

            $('#btn-them').click(function(e) {
                $('#modal-them').modal('show');
            })
        });
    </script>
@endsection

@section('footer')
    <x-admin-footer />
@endsection

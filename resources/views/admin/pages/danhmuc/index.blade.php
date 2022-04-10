@extends('admin.layout.layout')

@section('title')
    Sửa danh mục
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

                            <div class="card-body p-0">
                                <div class="ms-3 mt-3 mb-3 row">
                                    <div class="col">
                                        <button class="btn-primary btn me-5" data-toggle="modal" data-target="#modal-them">
                                            Thêm
                                        </button>
                                        <button class="btn-danger btn" id="xoa_da_chon">
                                            Xoá đã chọn
                                        </button>
                                    </div>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="custom-checkbox">
                                                    <input type="checkbox" id="selectAll">
                                                    <label for="selectAll"></label>
                                                </span>
                                            </th>
                                            <th>#</th>
                                            <th>Tên danh mục</th>
                                            <th>Ngày tạo</th>
                                            <th>Ngày sửa</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $stt = 0;
                                        @endphp

                                        @foreach ($danh_muc as $item)
                                            @php
                                                $stt++;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <span class="custom-checkbox">
                                                        <input type="checkbox" id="checkbox{{ $stt }}"
                                                            name="options[]" value="{{ $item->id }}">
                                                        <label for="checkbox1"></label>
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $stt }}
                                                </td>
                                                <td>
                                                    {{ $item->ten_danh_muc }}
                                                </td>
                                                <td>
                                                    {{ $item->created_at }}
                                                </td>
                                                <td>
                                                    {{ $item->updated_at }}
                                                </td>
                                                <td>
                                                    <span>
                                                        <i class="fas fa-edit fa-lg">
                                                        </i>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
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
@endsection

@section('footer')
    <x-admin-footer />
@endsection

@extends('admin.layout.layout')

@section('title')
    Thêm danh mục
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thêm mới</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="ten_danh_muc">Tên danh mục</label>
                                        <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc"
                                            placeholder="Nhập tên danh mục">
                                        <div class="invalid-feedback" id="ten_danh_muc"></div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" id="them_danh_muc">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <x-admin-footer />
@endsection

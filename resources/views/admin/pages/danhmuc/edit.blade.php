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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Sửa danh mục</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <input type="hidden" name="id" value="{{ $danh_muc->id }}">
                                    <div class="form-group">
                                        <label for="ten_danh_muc">Tên danh mục</label>
                                        <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc"
                                            value="{{ $danh_muc->ten_danh_muc }}" placeholder="Nhập tên danh mục">
                                        <div class="invalid-feedback" id="ten_danh_muc"></div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" id="sua_danh_muc">Sửa</button>
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

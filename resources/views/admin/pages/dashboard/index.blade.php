@extends('admin.layout.layout')

@section('title')
    Trang quản lý
@endsection

@section('header')
    <x-admin-header />
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 640px;">

        <x-breadcrumb />
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>
                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>
                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>
                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>
                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if (count($hoa_don) > 0)
                            <h3>Đơn hàng chờ xét duyệt</h3>
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã hoá đơn</th>
                                        <th>Tổng tiền</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td></td>
                                        <td><a href=""></a>
                                        </td>
                                        <td>0 VNĐ</td>
                                        <td></td>
                                        <td>

                                        </td>
                                        <td></td>
                                        <td>

                                            <button class="btn btn-primary" value="">Duyệt</button>
                                            <button class="btn btn-danger" value="">Huỷ</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-success my-4" role="alert">
                                <span>Không có đơn hàng chờ duyệt!!!</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </div>
    </section>

    </div>
@endsection

@section('footer')
    <x-admin-footer />
@endsection

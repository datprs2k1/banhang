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
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
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
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
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
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
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
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <section class="col-lg-12 connectedSortable">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Doanh thu 30 ngày gần đây
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">

                                            <button type="button" class="btn btn-primary btn-sm"
                                                data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body" id="doanhthu30ngay">
                                <div class="tab-content p-0">
                                    <div class="chart tab-pane active" id="revenue-chart" style="height: 500px;">
                                        <canvas id="doanh-thu-30-ngay" height="500" style="height: 500px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <section class="col-lg-7 connectedSortable">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Doanh thu 12 tháng gần đây
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">

                                            <button type="button" class="btn btn-primary btn-sm"
                                                data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body" id="doanhthu12thang">
                                <div class="tab-content p-0">
                                    <div class="chart tab-pane active" id="revenue-chart" style="height: 500px;">
                                        <canvas id="doanh-thu-12-thang" height="500" style="height: 500px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="col-lg-5 connectedSortable">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Số lượng sản phẩm đã bán
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">

                                            <button type="button" class="btn btn-primary btn-sm"
                                                data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body" id="sanpham">
                                <div class="tab-content p-0">
                                    <div class="chart tab-pane active" id="revenue-chart" style="height: 500px;">
                                        <canvas id="san-pham" height="500" style="height: 500px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/Chart.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>

    <script>
        $(document).ready(function() {

            $.ajax({
                url: '{{ route('thongke.30ngay') }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    const labels = Object.keys(response);
                    const values = Object.values(response);

                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'Doanh thu',
                            backgroundColor: 'rgb(54, 162, 235)',
                            borderColor: 'rgb(54, 162, 235)',
                            data: values,

                        }]
                    };

                    const config = {
                        type: 'line',
                        data: data,
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: false,
                                    text: 'Chart.js Line Chart'
                                }
                            },
                            maintainAspectRatio: false,

                        },
                    };

                    const myChart = new Chart(
                        $('#doanh-thu-30-ngay'),
                        config,
                    );
                }
            });


            $.ajax({
                url: '{{ route('thongke.12thang') }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    const labels = Object.keys(response);
                    const values = Object.values(response);

                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'Doanh thu',
                            backgroundColor: 'rgb(54, 162, 235)',
                            borderColor: 'rgb(54, 162, 235)',
                            data: values
                        }]
                    };

                    const config = {
                        type: 'bar',
                        data: data,
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: false,
                                    text: 'Chart.js Line Chart'
                                }
                            },
                            maintainAspectRatio: false,
                        },
                    };

                    const myChart = new Chart(
                        $('#doanh-thu-12-thang'),
                        config,
                    );

                }
            });


            $.ajax({
                url: '{{ route('thongke.sanpham') }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {

                    const labels = Object.keys(response);
                    const values = Object.values(response);

                    const color = {
                        'red': 'rgb(255, 99, 132)',
                        'orange': 'rgb(255, 159, 64)',
                        'yellow': 'rgb(255, 205, 86)',
                        'green': 'rgb(75, 192, 192)',
                        'blue': 'rgb(54, 162, 235)',
                        'purple': 'rgb(153, 102, 255)',
                        'grey': 'rgb(201, 203, 207)',
                    };

                    const data = {
                        labels: labels,
                        datasets: [{
                            backgroundColor: Object.values(color),
                            borderColor: Object.values(color),
                            data: values
                        }]
                    };

                    const config = {
                        type: 'doughnut',
                        data: data,
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: false,
                                    text: 'Chart.js Line Chart'
                                }
                            },
                            maintainAspectRatio: false,
                        },
                    };

                    const myChart = new Chart(
                        $('#san-pham'),
                        config,
                    );

                }
            });


        });
    </script>
@endsection

@section('footer')
    <x-admin-footer />
@endsection

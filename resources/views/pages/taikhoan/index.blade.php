@extends('layout.layout')

@section('title')
    Tài Khoản
@endsection

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <li>{{ Session::get('success') }}</li>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3>Xin chào {{ $user->name }}</h3>
                    <p>Chỉnh sửa thông tin cá nhân của bạn.</p>

                    <form action="{{ route('taikhoan.sua') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="name">Họ tên </label>
                            <input type="text" class="form-control unicase-form-control text-input" id="name"
                                name="name" value="{{ $user->name }}" required="true" placeholder="Họ tên: ">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="email">Email </label>
                            <input type="email" class="form-control unicase-form-control text-input" id="email"
                                name="email" value="{{ $user->email }}" required="true" placeholder="Email: ">
                        </div>




                        <div class="button-group">
                            <button type="submit" class="btn btn-success" name="update" title="Sửa">Sửa thông tin
                                cá nhân</button>
                            <button type="submit" class="btn btn-danger" name="delete" title="Xoá"
                                onclick="return confirm('Bạn chắc chắn muốn xoá tài khoản?')">Xoá tài khoản</button>
                            <a href="{{ route('logout') }}"class="btn btn-info" name="logout" title="Đăng xuất">Đăng
                                xuất</a>

                        </div>

                    </form>
                    <p style="margin-top:30px">Đổi mật khẩu.</p>
                    <form action="{{ route('doimatkhau') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="password">Mật khẩu cũ </label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password"
                                name="password" required="true" placeholder="******** ">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="new_password">Mật khẩu mới </label>
                            <input type="password" class="form-control unicase-form-control text-input" id="new_password"
                                name="new_password" required="true" placeholder="******** ">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="new_password_confirmation">Nhập lại mật khẩu </label>
                            <input type="password" class="form-control unicase-form-control text-input"
                                id="new_password_confirmation" name="new_password_confirmation" required="true"
                                placeholder="******** ">
                        </div>




                        <div class="button-group">
                            <button type="submit" class="btn btn-success" name="update" title="Sửa">Đổi mật
                                khẩu</button>


                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

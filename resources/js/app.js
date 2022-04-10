require('./bootstrap');
import $ from 'jquery';
import Swal from 'sweetalert2'
window.$ = window.jQuery = $;

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('#loginAdmin').click(function (e) {
    e.preventDefault();

    let email = $('input[name="email"]').val();
    let password = $('input[name="password"]').val();
    let remember = $('input[name="remember"]').prop('checked');

    $('input[name="email"]').removeClass('is-invalid');
    $('input[name="password"]').removeClass('is-invalid');
    $('input[name="email"]').next().next().html('');
    $('input[name="password"]').next().next().html('');

    $.ajax({
        url: window.location.href,
        type: 'POST',
        data: {
            email: email,
            password: password,
            remember: remember
        },
        beforeSend: function () {
            $('#loginAdmin').prop('disabled', true);
            $('#loginAdmin').html('<i class="fa fa-spinner fa-spin"></i> Đang đăng nhập...');
        },
        complete: function () {
            $('#loginAdmin').prop('disabled', false);
            $('#loginAdmin').html('Đăng nhập');
        },
        success: function (data) {
            Swal.fire({
                title: "Thành công!",
                text: "Đăng nhập thành công!",
                icon: "success",
                button: "OK!",
            }).then((result) => {
                if (result.value) {
                    window.location.href = '/admin';
                }
            });
        },
        error: function (error) {
            let responseText = JSON.parse(error.responseText);
            let errors = responseText.errors;
            $.each(errors, function (key, value) {
                if (key == 'error') {
                    Swal.fire({
                        title: "Lỗi!",
                        text: value,
                        icon: "error",
                        button: "OK!",
                    });
                }
                $('input[name="' + key + '"]').addClass('is-invalid');
                $('input[name="' + key + '"]').next().next().html(value);
            });
        }
    });
});


$('#them_danh_muc').click(function (e) {

    e.preventDefault();

    let ten_danh_muc = $('input[name="ten_danh_muc"]').val();

    $('input[name="ten_danh_muc"]').removeClass('is-invalid');
    $('input[name="ten_danh_muc"]').next().html('');

    $.ajax({
        url: window.location.protocol + '//' + window.location.host + '/admin/danhmuc',
        type: 'POST',
        data: {
            ten_danh_muc: ten_danh_muc
        },
        beforeSend: function () {
            $('#them_danh_muc').html('<i class="fa fa-spinner fa-spin"></i> Đang thêm...');
        },
        complete: function () {
            $('#them_danh_muc').html('Thêm');
        },
        success: function (data) {
            Swal.fire({
                title: "Thành công!",
                text: "Thêm danh mục thành công!",
                icon: "success",
                button: "OK!",
            }).then((result) => {
                location.reload();
            });
        },
        error: function (error) {
            let responseText = JSON.parse(error.responseText);
            let errors = responseText.errors;
            $.each(errors, function (key, value) {
                if (key == 'error') {
                    Swal.fire({
                        title: "Lỗi!",
                        text: value,
                        icon: "error",
                        button: "OK!",
                    });
                }
                $('input[name="' + key + '"]').addClass('is-invalid');
                $('input[name="' + key + '"]').next().html(value);
            });
        }
    });
});

$('#sua_danh_muc').click(function (e) {

    e.preventDefault();

    let ten_danh_muc = $('input[name="ten_danh_muc"]').val();
    let id = $('input[name="id"]').val();

    $('input[name="ten_danh_muc"]').removeClass('is-invalid');
    $('input[name="ten_danh_muc"]').next().html('');

    $.ajax({
        url: window.location.protocol + '//' + window.location.host + '/admin/danhmuc' + '/' + id,
        type: 'PUT',
        data: {
            ten_danh_muc: ten_danh_muc
        },
        beforeSend: function () {
            $('#sua_danh_muc').html('<i class="fa fa-spinner fa-spin"></i> Đang sửa...');
        },
        complete: function () {
            $('#sua_danh_muc').html('Sửa');
        },
        success: function (data) {
            Swal.fire({
                title: "Thành công!",
                text: "Sửa thành công!",
                icon: "success",
                button: "OK!",
            }).then((result) => {
                if (result.value) {
                    $('input[name="ten_danh_muc"]').val(data.ten_danh_muc);
                }
            });
        },
        error: function (error) {
            let responseText = JSON.parse(error.responseText);
            let errors = responseText.errors;
            $.each(errors, function (key, value) {
                if (key == 'error') {
                    Swal.fire({
                        title: "Lỗi!",
                        text: value,
                        icon: "error",
                        button: "OK!",
                    });
                }
                $('input[name="' + key + '"]').addClass('is-invalid');
                $('input[name="' + key + '"]').next().html(value);
            });
        }
    });
});

var checkbox = $('table tbody input[type="checkbox"]');

$("#selectAll").click(function () {
    if (this.checked) {
        checkbox.each(function () {
            this.checked = true;
        });
    } else {
        checkbox.each(function () {
            this.checked = false;
        });
    }
});

checkbox.click(function () {
    if (!this.checked) {
        $("#selectAll").prop("checked", false);
    }
});

$('#xoa_da_chon').click(function () {
    let id = [];

    checkbox.each(function () {
        if (this.checked) {
            id.push(this.value);
        }
    });

    if (id.length === 0) {
        Swal.fire({
            title: "Lỗi!",
            text: "Bạn chưa chọn dữ liệu cần xóa!",
            icon: "error",
            button: "OK!",
        });
    } else {
        $.ajax({
            url: window.location.protocol + '//' + window.location.host + '/admin/danhmuc',
            type: 'DELETE',
            data: {
                id: id,
            },
            beforeSend: function () {
                $('#xoa_da_chon').html('<i class="fa fa-spinner fa-spin"></i> Đang xóa...');
            }
        }).done(function (data) {
            Swal.fire({
                title: "Thành công!",
                text: "Xóa thành công!",
                icon: "success",
                button: "OK!",
            }).then((result) => {
                if (result.value) {
                    location.reload();
                }
            });
        });
    }
});

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

$('.btn_close').click(function (e) {
    $('#modal-sua').modal('hide');
    $('#modal-them').modal('hide');
});

$('.close').click(function (e) {
    $('#modal-sua').modal('hide');
    $('#modal-them').modal('hide');
});

$('#btn-them').click(function (e) {
    $('#modal-them').modal('show');
});

window.addEventListener('keyup', function (e) {
    if (e.keyCode == 27) {
        $('#modal-them').modal('hide');
        $('#modal-sua').modal('hide');
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
        url: window.location.protocol + '//' + window.location.host + '/admin/login',
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
            $('#them_danh_muc').html(
                '<i class="fa fa-spinner fa-spin"></i> Đang thêm...');
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
                if (result.value) {
                    $('#modal-them').modal('hide');
                    $('input[name="ten_danh_muc"]').val('');
                    let table = $('#danhsach').DataTable();
                    table.ajax.reload();
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

$('#sua_danh_muc').click(function (e) {

    e.preventDefault();

    let ten_danh_muc = $('input[name="_ten_danh_muc"]').val();
    let id = $('input[name="id"]').val();

    $('input[name="_ten_danh_muc"]').removeClass('is-invalid');
    $('input[name="_ten_danh_muc"]').next().html('');

    $.ajax({
        url: window.location.protocol + '//' + window.location.host + '/admin/danhmuc' +
            '/' + id,
        type: 'PUT',
        data: {
            ten_danh_muc: ten_danh_muc
        },
        beforeSend: function () {
            $('#sua_danh_muc').html(
                '<i class="fa fa-spinner fa-spin"></i> Đang sửa...');
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
                    $('input[name="_ten_danh_muc"]').val(data[0].ten_danh_muc);
                    $('#modal-sua').modal('hide');
                    let table = $('#danhsach').DataTable();
                    table.ajax.reload();
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


$(document).on('click', '.xoa_danh_muc', function (e) {
    let id = $(this).data('id');
    Swal.fire({
        title: "Bạn có chắc chắn muốn xóa?",
        text: "Sau khi xóa, bạn sẽ không thể khôi phục lại!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Vâng, tôi muốn xóa!",
        cancelButtonText: "Không, hủy xóa!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/danhmuc/' + id,
                type: 'DELETE',
                beforeSend: function () {
                    $('.xoa_danh_muc').html(
                        '<i class="fa fa-spinner fa-spin"></i> Đang xóa...');
                }, complete: function () {
                    $('.xoa_danh_muc').html('Xóa');
                }, success: function (data) {
                    Swal.fire({
                        title: "Thành công!",
                        text: "Xóa danh mục thành công!",
                        icon: "success",
                        button: "OK!",
                    }).then((result) => {
                        if (result.value) {
                            let table = $('#danhsach').DataTable();
                            table.row("[id='" + id + "']").remove().draw();
                        }
                    });
                }, error: function (error) {
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Xóa danh mục thất bại!",
                        icon: "error",
                        button: "OK!",
                    });
                }
            });
        }
    });
});

var file;

$('input[name="logo"]').on('change', function (e) {
    file = e.target.files[0];

    let src = window.URL.createObjectURL(file);
    $('#img-logo').attr('src', src);

});

$('input[name="_logo"]').on('change', function (e) {
    file = e.target.files[0];

    let src = window.URL.createObjectURL(file);
    $('#_img-logo').attr('src', src);

});


$('#them_nha_cung_cap').click(function (e) {

    e.preventDefault();

    let ten_nha_cung_cap = $('input[name="ten_nha_cung_cap"]').val();
    let gioi_thieu = $('textarea[name="gioi_thieu"]').val();
    let dia_chi = $('input[name="dia_chi"]').val();
    let phone = $('input[name="phone"]').val();
    let email = $('input[name="email"]').val();
    let website = $('input[name="website"]').val();
    let logo = file;

    let formData = new FormData();
    formData.append('ten_nha_cung_cap', ten_nha_cung_cap);
    formData.append('gioi_thieu', gioi_thieu);
    formData.append('dia_chi', dia_chi);
    formData.append('phone', phone);
    formData.append('email', email);
    formData.append('website', website);
    formData.append('logo', logo);

    $('input[name="ten_nha_cung_cap"]').removeClass('is-invalid');
    $('input[name="ten_nha_cung_cap"]').next().html('');
    $('textarea[name="gioi_thieu"]').removeClass('is-invalid');
    $('textarea[name="gioi_thieu"]').next().html('');
    $('input[name="dia_chi"]').removeClass('is-invalid');
    $('input[name="dia_chi"]').next().html('');
    $('input[name="phone"]').removeClass('is-invalid');
    $('input[name="phone"]').next().html('');
    $('input[name="email"]').removeClass('is-invalid');
    $('input[name="email"]').next().html('');
    $('input[name="website"]').removeClass('is-invalid');
    $('input[name="website"]').next().html('');
    $('input[name="logo"]').removeClass('is-invalid');
    $('input[name="logo"]').next().html('');


    $.ajax({
        url: window.location.protocol + '//' + window.location.host +
            '/admin/nhacungcap',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function () {
            $('#them_nha_cung_cap').html(
                '<i class="fa fa-spinner fa-spin"></i> Đang thêm...');
        },
        complete: function () {
            $('#them_nha_cung_cap').html('Thêm');
        },
        success: function (data) {
            Swal.fire({
                title: "Thành công!",
                text: "Thêm danh mục thành công!",
                icon: "success",
                button: "OK!",
            }).then((result) => {
                if (result.value) {
                    $('#modal-them').modal('hide');
                    $('input[name="ten_nha_cung_cap"]').val('');
                    $('textarea[name="gioi_thieu"]').val('');
                    $('input[name="dia_chi"]').val('');
                    $('input[name="phone"]').val('');
                    $('input[name="email"]').val('');
                    $('input[name="website"]').val('');
                    $('input[name="logo"]').val('');
                    $('#img-logo').attr('src', '');
                    $('#_img-logo').attr('src', '');
                    let table = $('#danhsach').DataTable();
                    table.ajax.reload();
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
                $('textarea[name="' + key + '"]').addClass('is-invalid');
                $('textarea[name="' + key + '"]').next().html(value);

            });
        }
    });
});

$('#sua_nha_cung_cap').on('click', function (e) {
    e.preventDefault();

    let id = $('input[name="id"]').val();
    let ten_nha_cung_cap = $('input[name="_ten_nha_cung_cap"]').val();
    let gioi_thieu = $('textarea[name="_gioi_thieu"]').val();
    let dia_chi = $('input[name="_dia_chi"]').val();
    let phone = $('input[name="_phone"]').val();
    let email = $('input[name="_email"]').val();
    let website = $('input[name="_website"]').val();
    let logo = file;

    $('input[name="_ten_nha_cung_cap"]').removeClass('is-invalid');
    $('input[name="_ten_nha_cung_cap"]').next().html('');
    $('textarea[name="_gioi_thieu"]').removeClass('is-invalid');
    $('textarea[name="_gioi_thieu"]').next().html('');
    $('input[name="_dia_chi"]').removeClass('is-invalid');
    $('input[name="_dia_chi"]').next().html('');
    $('input[name="_phone"]').removeClass('is-invalid');
    $('input[name="_phone"]').next().html('');
    $('input[name="_email"]').removeClass('is-invalid');
    $('input[name="_email"]').next().html('');
    $('input[name="_website"]').removeClass('is-invalid');
    $('input[name="_website"]').next().html('');
    $('input[name="_logo"]').removeClass('is-invalid');
    $('input[name="_logo"]').next().html('');

    let formData = new FormData();
    formData.append('id', id);
    formData.append('ten_nha_cung_cap', ten_nha_cung_cap);
    formData.append('gioi_thieu', gioi_thieu);
    formData.append('dia_chi', dia_chi);
    formData.append('phone', phone);
    formData.append('email', email);
    formData.append('website', website);
    formData.append('logo', logo ? logo : '');
    formData.append('_method', 'PUT');

    $.ajax({
        url: window.location.protocol + '//' + window.location.host +
            '/admin/nhacungcap/' + id,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function () {
            $('#sua_nha_cung_cap').html(
                '<i class="fa fa-spinner fa-spin"></i> Đang sửa...');
        },
        complete: function () {
            $('#sua_nha_cung_cap').html('Sửa');
        },
        success: function (data) {
            Swal.fire({
                title: "Thành công!",
                text: "Sửa danh mục thành công!",
                icon: "success",
                button: "OK!",
            }).then((result) => {
                if (result.value) {
                    $('#modal-sua').modal('hide');

                    let table = $('#danhsach').DataTable();
                    table.ajax.reload();
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
                $('input[name="_' + key + '"]').addClass('is-invalid');
                $('input[name="_' + key + '"]').next().html(value);
                $('textarea[name="_' + key + '"]').addClass('is-invalid');
                $('textarea[name="_' + key + '"]').next().html(value);

            });
        }
    });
});

$(document).on('click', '.xoa_nha_cung_cap', function (e) {
    let id = $(this).data('id');
    Swal.fire({
        title: "Bạn có chắc chắn muốn xóa?",
        text: "Sau khi xóa, bạn sẽ không thể khôi phục lại!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Vâng, tôi muốn xóa!",
        cancelButtonText: "Không, hủy xóa!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/nhacungcap/' + id,
                type: 'DELETE',
                beforeSend: function () {
                    $('.xoa_danh_muc').html(
                        '<i class="fa fa-spinner fa-spin"></i> Đang xóa...');
                }, complete: function () {
                    $('.xoa_danh_muc').html('Xóa');
                }, success: function (data) {
                    Swal.fire({
                        title: "Thành công!",
                        text: "Xóa danh mục thành công!",
                        icon: "success",
                        button: "OK!",
                    }).then((result) => {
                        if (result.value) {
                            let table = $('#danhsach').DataTable();
                            table.row("[id='" + id + "']").remove().draw();
                        }
                    });
                }, error: function (error) {
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Xóa danh mục thất bại!",
                        icon: "error",
                        button: "OK!",
                    });
                }
            });
        }
    });
});

$('#them_san_pham').on('click', function (e) {
    e.preventDefault();

    let ten_san_pham = $('input[name="ten_san_pham"]').val();
    let gia_ban = $('input[name="gia_ban"]').val();
    let mo_ta = $('textarea[name="mo_ta"]').val();
    let huong_dan_su_dung = $('textarea[name="huong_dan_su_dung"]').val();
    let so_luong = $('input[name="so_luong"]').val();
    let don_vi_tinh = $('#don_vi_tinh :selected').val();
    let id_nha_cung_cap = $('#id_nha_cung_cap :selected').val();
    let id_danh_muc = $('#id_danh_muc :selected').val();
    let hinh_anh = $('input[name="hinh_anh"]')[0].files[0];

    $('input[name="ten_san_pham"]').removeClass('is-invalid');
    $('input[name="ten_san_pham"]').next().html('');
    $('input[name="gia_ban"]').removeClass('is-invalid');
    $('input[name="gia_ban"]').next().html('');
    $('textarea[name="mo_ta"]').removeClass('is-invalid');
    $('textarea[name="mo_ta"]').next().html('');
    $('textarea[name="huong_dan_su_dung"]').removeClass('is-invalid');
    $('textarea[name="huong_dan_su_dung"]').next().html('');
    $('input[name="so_luong"]').removeClass('is-invalid');
    $('input[name="so_luong"]').next().html('');
    $('input[name="don_vi_tinh"]').removeClass('is-invalid');
    $('input[name="don_vi_tinh"]').next().html('');
    $('select[name="id_nha_cung_cap"]').removeClass('is-invalid');
    $('select[name="id_nha_cung_cap"]').next().html('');
    $('select[name="id_danh_muc"]').removeClass('is-invalid');
    $('select[name="id_danh_muc"]').next().html('');

    let formData = new FormData();
    formData.append('ten_san_pham', ten_san_pham);
    formData.append('gia_ban', gia_ban);
    formData.append('mo_ta', mo_ta);
    formData.append('huong_dan_su_dung', huong_dan_su_dung);
    formData.append('so_luong', so_luong);
    formData.append('don_vi_tinh', don_vi_tinh);
    formData.append('id_nha_cung_cap', id_nha_cung_cap);
    formData.append('id_danh_muc', id_danh_muc);
    formData.append('hinh_anh', hinh_anh ? hinh_anh : '');


    $.ajax({
        url: '/admin/sanpham',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('#them_san_pham').html(
                '<i class="fa fa-spinner fa-spin"></i> Đang thêm...');
        }, complete: function () {
            $('#them_san_pham').html('Thêm');
        }, success: function (data) {
            Swal.fire({
                title: "Thành công!",
                text: "Thêm sản phẩm thành công!",
                icon: "success",
                button: "OK!",
            }).then((result) => {
                if (result.value) {
                    window.location.href = '/admin/sanpham';
                }
            });
        }, error: function (error) {
            if (error.status === 422) {
                let errors = $.parseJSON(error.responseText);
                $.each(errors.errors, function (key, value) {
                    $('input[name="' + key + '"]').addClass('is-invalid');
                    $('input[name="' + key + '"]').next().html(value);
                });
            } else {
                Swal.fire({
                    title: "Lỗi!",
                    text: "Thêm sản phẩm thất bại!",
                    icon: "error",
                    button: "OK!",
                });
            }
        }
    });
});

$('#sua_san_pham').on('click', function (e) {
    e.preventDefault();

    let id = $('input[name="id"]').val();
    let ten_san_pham = $('input[name="_ten_san_pham"]').val();
    let gia_ban = $('input[name="_gia_ban"]').val();
    let mo_ta = $('textarea[name="_mo_ta"]').val();
    let huong_dan_su_dung = $('textarea[name="_huong_dan_su_dung"]').val();
    let so_luong = $('input[name="_so_luong"]').val();
    let don_vi_tinh = $('#_don_vi_tinh :selected').val();
    let id_nha_cung_cap = $('#_id_nha_cung_cap :selected').val();
    let id_danh_muc = $('#_id_danh_muc :selected').val();
    let hinh_anh = $('input[name="_hinh_anh"]')[0].files[0];

    $('input[name="_ten_san_pham"]').removeClass('is-invalid');
    $('input[name="_ten_san_pham"]').next().html('');
    $('input[name="_gia_ban"]').removeClass('is-invalid');
    $('input[name="_gia_ban"]').next().html('');
    $('textarea[name="_mo_ta"]').removeClass('is-invalid');
    $('textarea[name="_mo_ta"]').next().html('');
    $('textarea[name="_huong_dan_su_dung"]').removeClass('is-invalid');
    $('textarea[name="_huong_dan_su_dung"]').next().html('');
    $('input[name="_so_luong"]').removeClass('is-invalid');
    $('input[name="_so_luong"]').next().html('');
    $('input[name="_don_vi_tinh"]').removeClass('is-invalid');
    $('input[name="_don_vi_tinh"]').next().html('');
    $('select[name="_id_nha_cung_cap"]').removeClass('is-invalid');
    $('select[name="_id_nha_cung_cap"]').next().html('');
    $('select[name="_id_danh_muc"]').removeClass('is-invalid');
    $('select[name="_id_danh_muc"]').next().html('');

    let formData = new FormData();
    formData.append('id', id);
    formData.append('ten_san_pham', ten_san_pham);
    formData.append('gia_ban', gia_ban);
    formData.append('mo_ta', mo_ta);
    formData.append('huong_dan_su_dung', huong_dan_su_dung);
    formData.append('so_luong', so_luong);
    formData.append('don_vi_tinh', don_vi_tinh);
    formData.append('id_nha_cung_cap', id_nha_cung_cap);
    formData.append('id_danh_muc', id_danh_muc);
    formData.append('hinh_anh', hinh_anh ? hinh_anh : '');
    formData.append('_method', 'PUT');


    $.ajax({
        url: '/admin/sanpham/' + id,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('#sua_san_pham').html(
                '<i class="fa fa-spinner fa-spin"></i> Đang sửa...');
        }, complete: function () {
            $('#sua_san_pham').html('Sửa');
        }, success: function (data) {
            Swal.fire({
                title: "Thành công!",
                text: "Sửa sản phẩm thành công!",
                icon: "success",
                button: "OK!",
            }).then((result) => {
                if (result.value) {
                    window.location.href = '/admin/sanpham';
                }
            });
        }, error: function (error) {
            if (error.status === 422) {
                let errors = $.parseJSON(error.responseText);
                $.each(errors.errors, function (key, value) {
                    $('input[name="' + key + '"]').addClass('is-invalid');
                    $('input[name="' + key + '"]').next().html(value);
                });
            } else {
                Swal.fire({
                    title: "Lỗi!",
                    text: "Sửa sản phẩm thất bại!",
                    icon: "error",
                    button: "OK!",
                });
            }
        }
    });
});

$(document).on('click', '.xoa_san_pham', function (e) {

    e.preventDefault();

    let id = $(this).data('id');

    Swal.fire({
        title: 'Bạn có chắc muốn xóa?',
        text: "Sản phẩm sẽ bị xóa vĩnh viễn!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, xóa ngay!',
        cancelButtonText: 'Không, hủy!',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '/admin/sanpham/' + id,
                type: 'DELETE',
                beforeSend: function () {
                    $('#xoa_san_pham').html(
                        '<i class="fa fa-spinner fa-spin"></i> Đang xóa...');
                }, complete: function () {
                    $('#xoa_san_pham').html('Xóa');
                }, success: function (data) {
                    Swal.fire({
                        title: "Thành công!",
                        text: "Xóa sản phẩm thành công!",
                        icon: "success",
                        button: "OK!",
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = '/admin/sanpham';
                        }
                    });
                }, error: function (error) {
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Xóa sản phẩm thất bại!",
                        icon: "error",
                        button: "OK!",
                    });
                }
            });
        }
    });
});


$('#btn-dangnhap').on('click', function (e) {

    e.preventDefault();

    let email = $('input[name="_email"]').val();
    let password = $('input[name="_password"]').val();

    $('input[name="_email"]').removeClass('is-invalid');
    $('input[name="_email"]').next().html('');
    $('input[name="_password"]').removeClass('is-invalid');
    $('input[name="_password"]').next().html('');

    $.ajax({
        url: window.location.protocol + '//' + window.location.host + '/login',
        type: 'POST',
        data: {
            email: email,
            password: password
        }, beforeSend: function () {
            $('#btn-dangnhap').html(
                '<i class="fa fa-spinner fa-spin"></i> Đang đăng nhập...');
        }, complete: function () {
            $('#btn-dangnhap').html('Đăng nhập');
        }, success: function (data) {
            Swal.fire({
                title: "Thành công!",
                text: "Đăng nhập thành công!",
                icon: "success",
                button: "OK!",
            }).then((result) => {
                if (result.value) {
                    window.location.href = window.location.protocol + '//' + window.location.host;
                }
            });
        }, error: function (error) {
            let responseText = JSON.parse(error.responseText);
            let errors = responseText.errors;
            $.each(errors, (key, value) => {
                if (key == 'error') {
                    Swal.fire({
                        title: "Lỗi!",
                        text: value,
                        icon: "error",
                        button: "OK!",
                    });
                }
                $('input[name="_' + key + '"]').addClass('is-invalid');
                $('input[name="_' + key + '"]').next().html(value);
            });
        }
    });
});

$('#btn-dangky').on('click', function (e) {

    e.preventDefault();

    let name = $('input[name="name"]').val();
    let email = $('input[name="email"]').val();
    let password = $('input[name="password"]').val();
    let password_confirmation = $('input[name="password_confirmation"]').val();

    $('input[name="name"]').removeClass('is-invalid');
    $('input[name="name"]').next().html('');
    $('input[name="email"]').removeClass('is-invalid');
    $('input[name="email"]').next().html('');
    $('input[name="password"]').removeClass('is-invalid');
    $('input[name="password"]').next().html('');
    $('input[name="password_confirmation"]').removeClass('is-invalid');
    $('input[name="password_confirmation"]').next().html('');

    $.ajax({
        url: window.location.protocol + '//' + window.location.host + '/register',
        type: 'POST',
        data: {
            name: name,
            email: email,
            password: password,
            password_confirmation: password_confirmation
        }, beforeSend: function () {
            $('#btn-dangky').html(
                '<i class="fa fa-spinner fa-spin"></i> Đang đăng ký...');
        }, complete: function () {
            $('#btn-dangky').html('Đăng ký');
        }, success: function (data) {
            Swal.fire({
                title: "Thành công!",
                text: "Đăng ký thành công!",
                icon: "success",
                button: "OK!",
            }).then((result) => {
                if (result.value) {
                    window.location.href = window.location.protocol + '//' + window.location.host;
                }
            });
        }, error: function (error) {
            let responseText = JSON.parse(error.responseText);
            let errors = responseText.errors;
            $.each(errors, (key, value) => {
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


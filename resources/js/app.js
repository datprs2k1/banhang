require('./bootstrap');
import $ from 'jquery';
import Swal from 'sweetalert2'
window.$ = window.jQuery = $;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#loginAdmin').click(function (e) {
    e.preventDefault();
    loginAdmin();
});


function loginAdmin() {
    var email = $('input[name="email"]').val();
    var password = $('input[name="password"]').val();
    var remember = $('input[name="remember"]').val();
    var _token = $('input[name="_token"]').val();

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
            remember: remember,
            _token: _token
        },
        success: function (data) {
            Swal.fire({
                title: "Thành công!",
                text: "Đăng nhập thành công!",
                icon: "success",
                button: "OK!",
            }).then((result) => {
                if (result.value) {
                    window.location.href = '/admin/dashboard';
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
};

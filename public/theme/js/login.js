$(document).ready(function () {
    $('.change-language').on('change', function () {
        $.ajax({
            url: base_url + '/setLang',
            data: {'lang': $('.change-language').val()},
            dataType: 'JSON',
            method: 'POST',
            success: function (res) {
                if (res.success) location.reload();
                else alert('Error!');
            }
        });
    });
    $('.btn-login').on('click', function () {
        $(this).find('i').removeClass('fa-sign-in-alt').addClass('fa-spin fa-spinner');
        $.ajax({
            url: base_url + '/admin/login',
            data: {
                'username': $('.username').val(),
                'password': $('.password').val()
            },
            dataType: 'JSON',
            method: 'POST',
            success: function (res) {
                $('.btn-login').find('i').removeClass('fa-spin fa-spinner').addClass('fa-sign-in-alt');
                if (res.success) {
                    window.location.href = base_url + '/admin'
                } else alert('Password or Username incorrect!');
            }
        });
    });
});
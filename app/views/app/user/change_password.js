$('.submit-ticket-btn').on('click', function () {
    var cur_pass = $('#cur_pass').val();
    var new_pass = $('#new_pass').val();
    if (cur_pass && new_pass) {
        if ($('#retype_pass').val() !== $('#new_pass').val()) toastr.error("Retype password must is the same with new password!");
        else {
            var sp = new JSSpinner();
            sp.show('Loading');
            $.ajax({
                url: base_url + '/admin/user/change_password',
                method: 'POST',
                dataType: 'json',
                data: {
                    cur_pass: cur_pass,
                    new_pass: new_pass
                },
                success: function (res) {
                    sp.hide();
                    if (res.success) {
                        toastr.success("Success!");
                    } else {
                        toastr.error('Current password not correct!');
                    }
                }
            });
        }
    } else {
        toastr.error("input password for change before submit!");
    }
});
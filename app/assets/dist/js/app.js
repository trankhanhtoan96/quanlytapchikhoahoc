function convertToURLString(phrase) {
    var maxLength = 100;
    var returnString = phrase.toLowerCase();
    returnString = returnString.replace(/á/g, 'a');
    returnString = returnString.replace(/à/g, 'a');
    returnString = returnString.replace(/ả/g, 'a');
    returnString = returnString.replace(/ã/g, 'a');
    returnString = returnString.replace(/ạ/g, 'a');

    returnString = returnString.replace(/ă/g, 'a');
    returnString = returnString.replace(/ắ/g, 'a');
    returnString = returnString.replace(/ẳ/g, 'a');
    returnString = returnString.replace(/ằ/g, 'a');
    returnString = returnString.replace(/ẵ/g, 'a');
    returnString = returnString.replace(/ặ/g, 'a');

    returnString = returnString.replace(/â/g, 'a');
    returnString = returnString.replace(/ấ/g, 'a');
    returnString = returnString.replace(/ầ/g, 'a');
    returnString = returnString.replace(/ẩ/g, 'a');
    returnString = returnString.replace(/ẫ/g, 'a');
    returnString = returnString.replace(/ậ/g, 'a');

    returnString = returnString.replace(/ú/g, 'u');
    returnString = returnString.replace(/ù/g, 'u');
    returnString = returnString.replace(/ủ/g, 'u');
    returnString = returnString.replace(/ũ/g, 'u');
    returnString = returnString.replace(/ụ/g, 'u');

    returnString = returnString.replace(/ư/g, 'u');
    returnString = returnString.replace(/ứ/g, 'u');
    returnString = returnString.replace(/ừ/g, 'u');
    returnString = returnString.replace(/ử/g, 'u');
    returnString = returnString.replace(/ữ/g, 'u');
    returnString = returnString.replace(/ự/g, 'u');

    returnString = returnString.replace(/é/g, 'e');
    returnString = returnString.replace(/è/g, 'e');
    returnString = returnString.replace(/ẻ/g, 'e');
    returnString = returnString.replace(/ẽ/g, 'e');
    returnString = returnString.replace(/ẹ/g, 'e');

    returnString = returnString.replace(/ê/g, 'e');
    returnString = returnString.replace(/ế/g, 'e');
    returnString = returnString.replace(/ề/g, 'e');
    returnString = returnString.replace(/ể/g, 'e');
    returnString = returnString.replace(/ễ/g, 'e');
    returnString = returnString.replace(/ệ/g, 'e');

    returnString = returnString.replace(/ó/g, 'o');
    returnString = returnString.replace(/ò/g, 'o');
    returnString = returnString.replace(/ỏ/g, 'o');
    returnString = returnString.replace(/õ/g, 'o');
    returnString = returnString.replace(/ọ/g, 'o');

    returnString = returnString.replace(/ô/g, 'o');
    returnString = returnString.replace(/ố/g, 'o');
    returnString = returnString.replace(/ồ/g, 'o');
    returnString = returnString.replace(/ổ/g, 'o');
    returnString = returnString.replace(/ỗ/g, 'o');
    returnString = returnString.replace(/ộ/g, 'o');

    returnString = returnString.replace(/ơ/g, 'o');
    returnString = returnString.replace(/ớ/g, 'o');
    returnString = returnString.replace(/ờ/g, 'o');
    returnString = returnString.replace(/ở/g, 'o');
    returnString = returnString.replace(/ỡ/g, 'o');
    returnString = returnString.replace(/ợ/g, 'o');

    returnString = returnString.replace(/í/g, 'i');
    returnString = returnString.replace(/ì/g, 'i');
    returnString = returnString.replace(/ỉ/g, 'i');
    returnString = returnString.replace(/ĩ/g, 'i');
    returnString = returnString.replace(/ị/g, 'i');

    returnString = returnString.replace(/ö/g, 'o');
    returnString = returnString.replace(/ç/g, 'c');
    returnString = returnString.replace(/ş/g, 's');
    returnString = returnString.replace(/ı/g, 'i');
    returnString = returnString.replace(/ğ/g, 'g');
    returnString = returnString.replace(/ü/g, 'u');
    returnString = returnString.replace(/[^a-z0-9\s-]/g, "");
    returnString = returnString.replace(/[\s-]+/g, " ");
    returnString = returnString.replace(/^\s+|\s+$/g, "");
    if (returnString.length > maxLength) returnString = returnString.substring(0, maxLength);
    returnString = returnString.replace(/\s/g, "-");
    return returnString;
}

$(function () {
    $('.select2').select2({
        theme: 'bootstrap4'
    });
    $('.datatable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "order": [],
        "info": true,
        "pageLength": 20,
        "bLengthChange": false,
    });
    CKEDITOR.on('instanceReady', function (ev) {
        ev.editor.dataProcessor.htmlFilter.addRules({
            elements: {
                img: function (el) {
                    el.addClass('img-fluid');
                    var style = el.attributes.style;
                    if (style) {
                        var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style);
                        var width = match && match[1];
                        match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                        var height = match && match[1];
                        if (width) {
                            el.attributes.style = el.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                            el.attributes.width = width;
                        }
                        if (height) {
                            el.attributes.style = el.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                        }
                    }
                    if (!el.attributes.style) delete el.attributes.style;
                }
            }
        });
    });
    $('.datetimepicker').CalendarPopup({
        locale: cur_lang,
        dayOfWeekStart: 1,
        format: config.date_format_js + ' HH:mm',
        wrapSourceInput: false,
        mousewheel: false,
        allowNotFillTime: false,
        validateOnBlur: false
    });
    $('.datepicker').CalendarPopup({
        locale: cur_lang,
        dayOfWeekStart: 1,
        format: config.date_format_js,
        wrapSourceInput: false,
        mousewheel: false,
        validateOnBlur: false,
        timepicker: false
    });
    $('.timepicker').CalendarPopup({
        locale: cur_lang,
        format: 'HH:mm',
        wrapSourceInput: false,
        mousewheel: false,
        validateOnBlur: false,
        datepicker: false
    });
});

function buttonChooseFieldUpload(fieldName, type) {
    CKFinder.popup({
        resourceType: type,
        language: cur_lang,
        selectActionFunction: function (fileUrl, data, allFiles) {
            if (type == 'Images') {
                $('#img_' + fieldName).attr('src', fileUrl);
            } else {
                $('#file_' + fieldName).attr('href', fileUrl).show();
                var temp = fileUrl.split('/');
                if (temp.length > 0) {
                    $('#file_' + fieldName).html(decodeURI(temp[temp.length - 1].substr(0, 30)) + '...');
                }
            }
            $('#' + fieldName).val(fileUrl);
        }
    });
}


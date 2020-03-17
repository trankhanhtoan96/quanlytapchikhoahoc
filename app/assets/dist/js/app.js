$(function () {
    $('.select2').select2({
        theme: 'bootstrap4'
    });
    $('.ckeditor').each(function () {
        CKEDITOR.replace($(this).attr('id'));
    });
});
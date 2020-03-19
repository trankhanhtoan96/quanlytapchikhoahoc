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
});
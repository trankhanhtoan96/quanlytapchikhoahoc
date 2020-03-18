$(function () {
    $('.select2').select2({
        theme: 'bootstrap4'
    });
    $('.datatable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "order":[],
        "info": true,
    });
});
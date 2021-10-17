
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="<?php echo BASE_ADMIN.'dist/vendor/jquery-easing/jquery.easing.min.js'?>"></script>

<script src="<?php echo BASE_ADMIN.'dist/js/sb-admin-2.min.js'?>"></script>

<!-- Page level plugins -->
<script src="<?php echo BASE_ADMIN.'dist/vendor/chart.js/Chart.min.js'?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo BASE_ADMIN.'dist/js/demo/chart-area-demo.js'?>"></script>
<script src="<?php echo BASE_ADMIN.'dist/js/demo/chart-pie-demo.js'?>"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?=BASE.'dist/ckeditor/ckeditor.js'?>"></script>
<script src="<?php echo BASE_ADMIN.'dist/js/slug.js'?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.js"></script>
<!-- Select2 -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<!-- selectpicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script>
function Delete() {
    var conf = confirm('Bạn chắc chắn muốn xóa?');
    return conf;
}

$(document).ready(function() {
    $('#dataTable').DataTable();
    $('#table').DataTable();
});

CKEDITOR.replace('editor1');

$(document).ready(
    // function() {
    //     $('.my-select').select2({
    //         tags: true
    //     });
    // }
)
</script>
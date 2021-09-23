
<script src="<?php echo BASE_ADMIN.'dist/vendor/jquery/jquery.min.js'?>"></script>
<script src="<?php echo BASE_ADMIN.'dist/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>

<script src="<?php echo BASE_ADMIN.'dist/vendor/jquery-easing/jquery.easing.min.js'?>"></script>

<script src="<?php echo BASE_ADMIN.'dist/js/sb-admin-2.min.js'?>"></script>

<!-- Page level plugins -->
<script src="<?php echo BASE_ADMIN.'dist/vendor/chart.js/Chart.min.js'?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo BASE_ADMIN.'dist/js/demo/chart-area-demo.js'?>"></script>
<script src="<?php echo BASE_ADMIN.'dist/js/demo/chart-pie-demo.js'?>"></script>
<script src="<?php echo BASE_ADMIN.'dist/js/slug.js'?>"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
<script>
function Delete(){
    var conf = confirm('Bạn chắc chắn muốn xóa?');
    return conf;
}

$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>


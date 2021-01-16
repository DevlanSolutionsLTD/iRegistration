<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Load Charts -->
<?php require_once('charts.php'); ?>
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../public/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="../public/plugins/datatables/jquery.dataTables.js"></script>
<script src="../public/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- Initialize Em -->
<script>
    $(function() {
        $("#dt-1").DataTable();
        $('#dt-2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
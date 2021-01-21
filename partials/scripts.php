<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Load Charts -->
<?php require_once('charts.php'); ?>
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../public/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="../public/plugins/datatables/jquery.dataTables.js"></script>
<script src="../public/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- Select2 -->
<script src="../public/plugins/select2/js/select2.full.min.js"></script>
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
<!-- File Uploads  -->
<script src="../public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
<script>
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
<!-- Print Certificates -->
<script>
    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }
</script>
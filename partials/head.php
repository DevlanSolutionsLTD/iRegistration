<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>iRegistration - Births And Deaths Registration Information System</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
  <!-- Bootstrap Select CSS -->
  <link rel="stylesheet" href="../public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../public/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <script src="../public/dist/js/swal.js"></script>
  <!-- Certificates CSS -->
  <link rel="stylesheet" href="../public/dist/css/certificate.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!--Inject SWAL-->
  <?php if (isset($success)) { ?>
    <!--This code for injecting success alert-->
    <script>
      setTimeout(function() {
          swal("Success", "<?php echo $success; ?>", "success");
        },
        100);
    </script>

  <?php } ?>

  <?php if (isset($err)) { ?>
    <!--This code for injecting error alert-->
    <script>
      setTimeout(function() {
          swal("Failed", "<?php echo $err; ?>", "error");
        },
        100);
    </script>

  <?php } ?>
  <?php if (isset($info)) { ?>
    <!--This code for injecting info alert-->
    <script>
      setTimeout(function() {
          swal("Success", "<?php echo $info; ?>", "warning");
        },
        100);
    </script>

  <?php }
  ?>
</head>
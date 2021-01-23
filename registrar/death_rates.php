<?php
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../config/codeGen.php');
?>
<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>iRegistration - Deaths Reports</title>
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
    <link rel="stylesheet" type="text/css" href="../public/plugins/datatable/custom_dt_html5.css">


</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <?php require_once('../partials/navigation.php'); ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-left text-dark">Deaths Rates Records</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Death Reports</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-12">
                            <br>
                            <table id="export-dt" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Reg No</th>
                                        <th>Name</th>
                                        <th>Regisrar Name</th>
                                        <th>DOB</th>
                                        <th>Gender</th>
                                        <th>Occupation</th>
                                        <th>Tribe</th>
                                        <th>Place Of Death</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM `deaths_registration` ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    $cnt = 1;
                                    while ($deaths = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $deaths->reg_number; ?></td>
                                            <td><?php echo $deaths->name; ?></td>
                                            <td><?php echo $deaths->registrar_name; ?></td>
                                            <td><?php echo $deaths->dob; ?></td>
                                            <td><?php echo $deaths->sex; ?></td>
                                            <td><?php echo $deaths->occupation; ?></td>
                                            <td><?php echo $deaths->tribe; ?></td>
                                            <td><?php echo $deaths->place_of_death; ?></td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('../partials/footer.php'); ?>
    </div>
    <!-- REQUIRED SCRIPTS -->
    <?php require_once('../partials/scripts.php'); ?>
</body>


</html>
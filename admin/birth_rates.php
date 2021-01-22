<?php
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../config/codeGen.php');

require_once('../partials/head.php');

?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <?php require_once('../partials/navigation.php'); ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-left text-dark">Births Rates Records</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Birth Reports</li>
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
                                        <th>Father</th>
                                        <th>Mother</th>
                                        <th>Place Of Birth</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM `births_registration` ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    $cnt = 1;
                                    while ($births = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $births->reg_number; ?></td>
                                            <td><?php echo $births->name; ?></td>
                                            <td><?php echo $births->registrar_name; ?></td>
                                            <td><?php echo $births->dob; ?></td>
                                            <td><?php echo $births->sex; ?></td>
                                            <td><?php echo $births->fathers_name; ?></td>
                                            <td><?php echo $births->mothers_name; ?></td>
                                            <td><?php echo $births->place_of_birth; ?></td>
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
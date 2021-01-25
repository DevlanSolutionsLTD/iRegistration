<?php
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../config/codeGen.php');
require_once('../partials/head.php');
registrar_check_login();


?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <?php require_once('../partials/navigation.php'); ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-left text-dark">Death Certificates</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Death Certificates</li>
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
                            <table id="dt-1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Reg No</th>
                                        <th>Name</th>
                                        <th>DOB</th>
                                        <th>Gender</th>
                                        <th>Occupation</th>
                                        <th>Tribe</th>
                                        <th>Place Of Death</th>
                                        <th>Manage</th>
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
                                            <td><?php echo $deaths->dob; ?></td>
                                            <td><?php echo $deaths->sex; ?></td>
                                            <td><?php echo $deaths->occupation; ?></td>
                                            <td><?php echo $deaths->tribe; ?></td>
                                            <td><?php echo $deaths->place_of_death; ?></td>
                                            <td>
                                                <a class="badge badge-primary" data-toggle="modal" href="#generate-<?php echo $deaths->id; ?>">
                                                    <i class="fas fa-certificate"></i>
                                                    Generate Certificate
                                                </a>
                                                <!-- Update Births Modal -->
                                                <div class="modal fade" id="generate-<?php echo $deaths->id; ?>">
                                                    <div class="modal-dialog  modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo $deaths->name; ?> Birth Certificate</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="Print_cert">
                                                                    <div class="text-center">
                                                                        <img class="img-fluid" height="150" width="150" src="../public/dist/img/Coat_Of_Arms.png">
                                                                    </div>
                                                                    <div class="row text-center">
                                                                        <div class="col-sm-12">
                                                                            <h3 class="text-bold">REPUBLIC OF KENYA</h3>
                                                                            <h4 class="text-bold">CERTIFICATE OF DEATH</h4>
                                                                            <h6 class="text-bold">ENTRY NUMBER <?php echo $deaths->reg_number; ?> </h6>
                                                                        </div>
                                                                    </div>
                                                                    <table class="table table-bordered table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                               
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Death in <?php echo $deaths->place_of_death; ?> at county <?php echo $deaths->place_of_death; ?> </td>
                                                                                
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table class="table table-bordered table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                               
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Entry <br> No.</td>
                                                                                <td><?php echo $deaths->reg_number; ?></td>
                                                                                <td>Name and Surname <br> of deceased</td>
                                                                                <td><?php echo $deaths->name; ?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table class="table table-bordered table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                               
                                                                            </tr>
                                                                            
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                            <td>Sex</td>
                                                                                <td><?php echo $deaths->sex; ?></td>
                                                                                <td>Age</td>
                                                                                <td><?php echo $deaths->age; ?></td>
                                                                                <td>Occupation</td>
                                                                                <td><?php echo $deaths->occupation; ?></td> 
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table class="table table-bordered table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                               
                                                                            </tr>
                                                                            
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                            <td>Date <br> of <br> death</td>
                                                                                <td><?php echo $deaths->created_at; ?></td>
                                                                                <td>Place <br> of <br> death</td>
                                                                                <td><?php echo $deaths->place_of_death; ?></td>
                                                                                
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <hr>
                                                                    <h5 class="text-danger text-center ">
                                                                        I <?php echo $deaths->registrar_name; ?> District / Assistant Registrar For Machakos District,
                                                                        Hereby Certify That This Certificate Is Compiled From An Entry / Return In The Register Of
                                                                        Death In The District.
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button id="print" onclick="printContent('Print_cert');" class="btn btn-default">Print Certificate</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->
                                            </td>
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
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
                            <h1 class="m-0 text-left text-dark">Birth Certificates</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Birth Registration Certificates</li>
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
                                        <th>Father</th>
                                        <th>Mother</th>
                                        <th>Place Of Birth</th>
                                        <th>Manage</th>
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
                                            <td><?php echo $births->dob; ?></td>
                                            <td><?php echo $births->sex; ?></td>
                                            <td><?php echo $births->fathers_name; ?></td>
                                            <td><?php echo $births->mothers_name; ?></td>
                                            <td><?php echo $births->place_of_birth; ?></td>
                                            <td>
                                                <a class="badge badge-primary" data-toggle="modal" href="#generate-<?php echo $births->id; ?>">
                                                    <i class="fas fa-certificate"></i>
                                                    Generate Certificate
                                                </a>
                                                <!-- Update Births Modal -->
                                                <div class="modal fade" id="generate-<?php echo $births->id; ?>">
                                                    <div class="modal-dialog  modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo $births->name; ?> Birth Certificate</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <div class="container-fluid">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="text-center">
                                                                                            <img class="img-fluid" height="150" width="150" src="../public/dist/img/Coat_Of_Arms.png">
                                                                                        </div>
                                                                                        <div class="row text-center">
                                                                                            <div class="col-sm-12">
                                                                                                <h3 class="text-bold">REPUBLIC OF KENYA</h3>
                                                                                                <h4 class="text-bold">CERTIFICATE OF BIRTH</h4>
                                                                                            </div>
                                                                                            <div class="col-sm-12">
                                                                                                <p class="light-bold">The Certification Body</p>
                                                                                            </div>
                                                                                            <div class="col-sm-12">
                                                                                                <p class="light-bold"> of TÜV SÜD Asia Pacific TÜV SÜD Group</p>
                                                                                            </div>
                                                                                            <div class="col-sm-12">
                                                                                                <p id="certifyPos">certifies that</p>
                                                                                            </div>
                                                                                            <div class="col-sm-12">
                                                                                                <img id="hospLogo" src="img/hosp_logo.png">
                                                                                            </div>
                                                                                            <div class="col-sm-12">
                                                                                                <b class="medium-font">Mahatma Gandhi Cancer Hospital and</b>
                                                                                            </div>
                                                                                            <div class="col-sm-12">
                                                                                                <b class="medium-font">Research Institute</b>
                                                                                            </div>
                                                                                            <div class="col-sm-12">
                                                                                                <p class="light-bold">1/7, MVP Colony,</p>
                                                                                            </div>
                                                                                            <div class="col-sm-12 margin-prop">
                                                                                                <p class="light-bold">Visakhapatnam -530 017, Andhra Pradesh, INDIA</p>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12">
                                                                                                    <p>has established and applies</p>
                                                                                                </div>
                                                                                                <div class="col-sm-12 margin-prop">
                                                                                                    <p>a Occupational Health and Safety Management System for</p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 ">
                                                                                                    <b>Provision Of Health Care Services</b>
                                                                                                    <br>
                                                                                                    <br>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12">
                                                                                                    <p>An audit was performed, Report No.<b> 20043553</b></p>
                                                                                                </div>
                                                                                                <div class="col-sm-12">
                                                                                                    <p>Proof has been furnished that the requirements</p>
                                                                                                </div>
                                                                                                <div class="col-sm-12 margin-prop">
                                                                                                    <p>According to</p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div id="specMargin" class="col-sm-12">
                                                                                                    <h4>OHSAS 18001:2007</h4>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12">
                                                                                                    <p>are fullified. The certificate is valid until 2018-08-26</p>
                                                                                                </div>
                                                                                                <div class="col-sm-12">
                                                                                                    <p>Certificate Registration No. <b>TUV116 97 3288</b></p>
                                                                                                    <br>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12">
                                                                                                    <b>2015-08-27</b>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12">
                                                                                                    <img class="pull-right" id="signLogo" src="img/sign.png">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 text-center">
                                                                                                    <p id="smallFont">TÜV SÜD Korea ltd. &#9679; 29F, Two IFC, 10 Gukjegeumyung-ro, Yeongdeungpo-gu &#9679; Seoul, 150-945 &#9679; Korea</p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <img class="pull-right" id="footerLogo" src="img/tüv.png">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
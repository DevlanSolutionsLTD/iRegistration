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
                            <h1 class="m-0 text-left text-dark">Births Registration Records</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Births Registrations</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <div class="text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#import-modal">Import Birth Records </button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-modal">Add Birth Record</button>
                    </div>
                    <!-- Import Births Registration Modal -->
                    <div class="modal fade" id="import-modal">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">
                                        Allowed file types: XLS, XLSX. Please, <a href="public/templates/sample_births.xlsx">Download</a> The Sample File.
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form -->
                                    <form method="post" enctype="multipart/form-data" role="form">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="exampleInputFile">Select File</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input required name="file" accept=".xls,.xlsx" type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="upload" class="btn btn-primary">Upload File</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Import Birth Registration Modal -->

                    <!-- Add Birth Registration  Modal -->
                    <div class="modal fade" id="add-modal">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Fill All Given Fields</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form -->
                                    <form method="post" enctype="multipart/form-data" role="form">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Registration Number</label>
                                                    <input type="text" required name="reg_number" value="<?php echo $a; ?>-<?php echo $b; ?>" class="form-control" id="exampleInputEmail1">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Registrar Name</label>
                                                    <select type="text" required name="registrar_name" class="form-control basic">
                                                        <?php
                                                        /* Pull A List Of All Registers */
                                                        $ret = "SELECT * FROM `users` ";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute(); //ok
                                                        $res = $stmt->get_result();
                                                        $cnt = 1;
                                                        while ($users = $res->fetch_object()) {
                                                        ?>
                                                            <option><?php echo $users->name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Child Full Name</label>
                                                    <input type="text" required name="name" class="form-control" id="exampleInputEmail1">
                                                    <!-- Hide This -->
                                                    <input type="hidden" required name="id" value="<?php echo $ID; ?>" class="form-control">
                                                    <input type="hidden" required name="month_reg" value="<?php echo date('M'); ?>" class="form-control">
                                                    <input type="hidden" required name="year_reg" value="<?php echo date('Y'); ?>" class="form-control">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="">Child Date Of Birth</label>
                                                    <input type="text" required name="dob" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Child Gender</label>
                                                    <select type="text" required name="sex" class="form-control basic">
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Fathers Full Name </label>
                                                    <input type="text" required name="fathers_name" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Mother's Full Name</label>
                                                    <input type="text" required name="mothers_name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="exampleInputPassword1">Place Of Birth</label>
                                                    <textarea required name="place_of_birth" rows="3" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="add_birth" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Add Registras Modal -->
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
                                                <a class="badge badge-primary" data-toggle="modal" href="#update-<?php echo $births->id; ?>">
                                                    <i class="fas fa-edit"></i>
                                                    Update
                                                </a>
                                                <!-- Update Births Modal -->
                                                <div class="modal fade" id="update-<?php echo $births->id; ?>">
                                                    <div class="modal-dialog  modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Update <?php echo $births->reg_number; ?> Record</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Form -->
                                                                <form method="post" enctype="multipart/form-data" role="form">
                                                                    <div class="card-body">
                                                                        <div class="row">

                                                                            <div class="form-group col-md-6">
                                                                                <label for="">Registrar Name</label>
                                                                                <input type="text" readonly required name="name" value="<?php echo $births->registrar_name ?>" class="form-control" id="exampleInputEmail1">
                                                                                <input type="hidden" required name="reg_number" value="<?php echo $births->reg_number; ?>" class="form-control">
                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <label for="">Child Full Name</label>
                                                                                <input type="text" required name="name" value="<?php echo $births->name; ?>" class="form-control" id="exampleInputEmail1">

                                                                            </div>

                                                                            <div class="form-group col-md-6">
                                                                                <label for="">Child Date Of Birth</label>
                                                                                <input type="text" required name="dob" value="<?php echo $births->dob; ?>" class="form-control">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="">Child Gender</label>
                                                                                <select type="text" required name="sex" class="form-control basic">
                                                                                    <option selected><?php echo $births->sex; ?></option>
                                                                                    <option>Male</option>
                                                                                    <option>Female</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="">Fathers Full Name </label>
                                                                                <input type="text" required name="fathers_name" value="<?php echo $births->fathers_name; ?>" class="form-control">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="">Mother's Full Name</label>
                                                                                <input type="text" required name="mothers_name" value="<?php echo $births->mothers_name; ?>" class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="exampleInputPassword1">Place Of Birth</label>
                                                                                <textarea required name="place_of_birth" rows="3" class="form-control" value=""><?php echo $births->place_of_birth; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-right">
                                                                        <button type="submit" name="update_birth" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->

                                                <a class="badge badge-danger" data-toggle="modal" href="#delete_birth-<?php echo $births->id; ?>">
                                                    <i class="fas fa-trash"></i>
                                                    Delete
                                                </a>
                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="delete_birth-<?php echo $births->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">CONFIRM</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center text-danger">
                                                                <h4>Delete <?php echo $births->name; ?> - <?php echo $births->reg_number; ?> Birth Record ?</h4>
                                                                <br>
                                                                <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                <a href="births_registration.php?delete_birth=<?php echo $births->id; ?>" class="text-center btn btn-danger"> Delete </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
<?php
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../config/codeGen.php');

/* Import Birth Registration Files From Excel Sheets */
use DevLanDataAPI\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once('../config/DataSource.php');
$db = new DataSource();
$conn = $db->getConnection();
require_once('../vendor/autoload.php');

if (isset($_POST["upload"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    /* Where Magic Happens */

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = '../public/uploads/xls/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 1; $i <= $sheetCount; $i++) {

            $id = "";
            if (isset($spreadSheetAry[$i][0])) {
                $id = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }

            $name = "";
            if (isset($spreadSheetAry[$i][1])) {
                $name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }

            $dob = "";
            if (isset($spreadSheetAry[$i][2])) {
                $dob = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }

            $sex = "";
            if (isset($spreadSheetAry[$i][3])) {
                $sex = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }

            $fathers_name = "";
            if (isset($spreadSheetAry[$i][4])) {
                $fathers_name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }

            $mothers_name = "";
            if (isset($spreadSheetAry[$i][5])) {
                $mothers_name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
            }

            $place_of_birth = "";
            if (isset($spreadSheetAry[$i][6])) {
                $place_of_birth = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
            }

            $month_reg = "";
            if (isset($spreadSheetAry[$i][7])) {
                $month_reg = mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
            }

            $year_reg = "";
            if (isset($spreadSheetAry[$i][8])) {
                $year_reg = mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]);
            }
            
            $created_at = date('d M Y');

            //Get A System Generated Birth Registration Number
            $reg_number = $alpha-$beta;
            
            if (!empty($name) || !empty($dob) || !empty($place_of_birth) || !empty($dob) || !empty($sex)) {
                $query = "INSERT INTO births_registration (id, reg_number, name, dob, sex, fathers_name, mothers_name, place_of_birth, month_reg, year_reg, created_at) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
                $paramType = "sssssssssss";
                $paramArray = array(
                    $id,
                    $reg_number,
                    $name,
                    $dob,
                    $sex,
                    $fathers_name,
                    $mothers_name,
                    $place_of_birth,
                    $month_reg,
                    $year_reg,
                    $created_at
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                if (!empty($insertId)) {
                    $err = "Error Occured While Importing Data";
                } else {
                    $success = "Data Imported" && header("refresh:1; url=births_registration.php");
                }
            }
        }
    } else {
        $info = "Invalid File Type. Upload Excel File.";
    }
}

/* Add Birth Registration  */
if (isset($_POST['add_birth'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = mysqli_real_escape_string($mysqli, trim($_POST['name']));
    } else {
        $error = 1;
        $err = "Child Name Cannot Be Empty";
    }
    if (isset($_POST['dob']) && !empty($_POST['dob'])) {
        $dob = mysqli_real_escape_string($mysqli, trim($_POST['dob']));
    } else {
        $error = 1;
        $err = "Date Of Birth Cannot Be Empty";
    }
    if (isset($_POST['sex']) && !empty($_POST['sex'])) {
        $sex = mysqli_real_escape_string($mysqli, trim($_POST['sex']));
    } else {
        $error = 1;
        $err = "Gender Cannot Be Empty";
    }
    
    /* System Generated Registration Number -> To Edit This File Check Codegen.php File Under Configs*/
    if (isset($_POST['reg_number']) && !empty($_POST['reg_number'])) {
        $reg_number = mysqli_real_escape_string($mysqli, trim($_POST['reg_number']));
    } else {
        $error = 1;
        $err = "Registration Number Cannot Be Empty";
    }
    
    if (!$error) {
        //prevent Double entries
        $sql = "SELECT * FROM  births_registration WHERE  reg_number='$reg_number'  ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($reg_number == $row['reg_number']) {
                $err =  "A Birth With That Registration Number Exists";
            }
        } else {
            $id = $_POST['id'];
            $reg_number = $_POST['reg_number'];
            $registrar_name = $_POST['registrar_name'];
            $name = $_POST['name'];
            $dob  = $_POST['dob'];
            $sex = $_POST['sex'];
            $fathers_name = $_POST['fathers_name'];
            $mothers_name = $_POST['mothers_name'];
            $place_of_birth = $_POST['place_of_birth'];
            $month_reg = $_POST['month_reg'];
            $year_reg = $_POST['year_reg'];
            $created_at = date('d M Y');

            $query = "INSERT INTO births_registration (id, reg_number, registrar_name, name, dob, sex, fathers_name, mothers_name, place_of_birth, month_reg, year_reg, created_at) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('ssssssssssss', $id, $reg_number, $registrar_name, $name, $dob, $sex, $fathers_name, $mothers_name, $place_of_birth, $month_reg, $year_reg, $created_at);
            $stmt->execute();
            if ($stmt) {
                $success = "Added" && header("refresh:1; url=births_registration.php");
            } else {
                //inject alert that profile update task failed
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}

/* Update Birth */
if (isset($_POST['update_birth'])) {
   /* Handle Birth Records Update Logic */
}

if (isset($_GET['delete_birth'])) {
    /* Handle Birth Records Deletion Here */
}

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
                            <h1 class="m-0 text-left text-dark">Registrars</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manage Registras</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <div class="text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#import-modal">Import Registras </button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-modal">Add Registrar</button>
                    </div>
                    <!-- Import Registras Modal -->
                    <div class="modal fade" id="import-modal">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">
                                        Allowed file types: XLS, XLSX. Please, <a href="public/templates/registras.xls">Download</a> The Sample File.
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
                    <!-- End Import Registras Modal -->

                    <!-- Add Registras Modal -->
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
                                                    <label for="">Name</label>
                                                    <input type="text" required name="name" class="form-control" id="exampleInputEmail1">
                                                    <input type="hidden" required name="id" value="<?php echo $ID; ?>" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">ID / Passport Number</label>
                                                    <input type="text" required name="national_idno" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="">Email</label>
                                                    <input type="email" required name="email" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Phone Number</label>
                                                    <input type="text" required name="phone" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Gender</label>
                                                    <select type="text" required name="sex" class="form-control basic">
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="exampleInputPassword1">Address</label>
                                                    <textarea required name="addr" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="add_registrar" class="btn btn-primary">Submit</button>
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
                                        <th>Full Name</th>
                                        <th>ID No</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Address</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM `users` ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    $cnt = 1;
                                    while ($users = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $users->name; ?></td>
                                            <td><?php echo $users->national_idno; ?></td>
                                            <td><?php echo $users->sex; ?></td>
                                            <td><?php echo $users->email; ?></td>
                                            <td><?php echo $users->phone; ?></td>
                                            <td><?php echo $users->addr; ?></td>
                                            <td>
                                                <a class="badge badge-primary" data-toggle="modal" href="#update-<?php echo $users->id; ?>">
                                                    <i class="fas fa-edit"></i>
                                                    Update
                                                </a>
                                                <!-- Update Registrar Modal -->
                                                <div class="modal fade" id="update-<?php echo $users->id; ?>">
                                                    <div class="modal-dialog  modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Update <?php echo $users->name; ?> Profile</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" enctype="multipart/form-data" role="form">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="">Name</label>
                                                                                <input type="text" required name="name" value="<?php echo $users->name; ?>" class="form-control" id="exampleInputEmail1">
                                                                                <input type="hidden" required name="id" value="<?php echo $users->id; ?>" class="form-control">
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="">ID / Passport Number</label>
                                                                                <input type="text" required name="national_idno" value="<?php echo $users->national_idno; ?>" class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group col-md-4">
                                                                                <label for="">Email</label>
                                                                                <input type="email" required name="email" value="<?php echo $users->email; ?>" class="form-control">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="">Phone Number</label>
                                                                                <input type="text" required name="phone" value="<?php echo $users->phone; ?>" class="form-control">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="">Gender</label>
                                                                                <select type="text" required name="sex" class="form-control basic">
                                                                                    <option><?php echo $users->sex; ?></option>
                                                                                    <option>Male</option>
                                                                                    <option>Female</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="form-group col-md-12">
                                                                                <label for="exampleInputPassword1">Address</label>
                                                                                <textarea required name="addr" rows="5" class="form-control"><?php echo $users->addr; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-right">
                                                                        <button type="submit" name="update_registrar" class="btn btn-primary">Submit</button>
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

                                                <a class="badge badge-danger" data-toggle="modal" href="#delete-<?php echo $users->id; ?>">
                                                    <i class="fas fa-trash"></i>
                                                    Delete
                                                </a>
                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="delete-<?php echo $users->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">CONFIRM</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center text-danger">
                                                                <h4>Delete <?php echo $users->name; ?> ?</h4>
                                                                <br>
                                                                <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                <a href="registras.php?delete=<?php echo $users->id; ?>" class="text-center btn btn-danger"> Delete </a>
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
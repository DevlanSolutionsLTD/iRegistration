<?php
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../config/codeGen.php');

if (isset($_POST['add_auth_permission'])) {
    /* Give User Auth Permission */
    $error = 0;

    if (isset($_POST['auth_email']) && !empty($_POST['auth_email'])) {
        $auth_email = mysqli_real_escape_string($mysqli, trim($_POST['auth_email']));
    } else {
        $error = 1;
        $err = "Email Address Cannot Be Empty";
    }
    if (isset($_POST['auth_passsword']) && !empty($_POST['auth_passsword'])) {
        $auth_passsword = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['auth_passsword']))));
    } else {
        $error = 1;
        $err = "Auth Password Cannot Be Empty";
    }

    if (isset($_POST['auth_permission']) && !empty($_POST['auth_permission'])) {
        $auth_permission = mysqli_real_escape_string($mysqli, trim($_POST['auth_permission']));
    } else {
        $error = 1;
        $err = "Auth Permissions Cannot Be Empty";
    }
    if (isset($_POST['auth_id']) && !empty($_POST['auth_id'])) {
        $auth_id = mysqli_real_escape_string($mysqli, trim($_POST['auth_id']));
    } else {
        $error = 1;
        $err = "Auth ID Cannot Be Empty";
    }

    if (isset($_POST['auth_status']) && !empty($_POST['auth_status'])) {
        $auth_status = mysqli_real_escape_string($mysqli, trim($_POST['auth_status']));
    } else {
        $error = 1;
        $err = "Auth Status Cannot Be Empty";
    }

    if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
        $auth_status = mysqli_real_escape_string($mysqli, trim($_POST['user_id']));
    } else {
        $error = 1;
        $err = "User ID  Cannot Be Empty";
    }

    if (!$error) {
        /* 
            Auth Permissions Logic
            1. Insert User Auth Details On Auth Table
            2. Update Users Table Add Auth ID And Auth Status
         */
        $authDetails = "INSERT INTO authentication (auth_id, auth_permission, auth_email, auth_password) VALUES(?,?,?,?)";
        $userAuthStatus = "UPDATE users SET auth_id = ?, auth_status = ? WHERE user_id = ?";

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
                            <h1 class="m-0 text-left text-dark">Users With Auth Permissions</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">User Auth Permissions</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <div class="text-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-modal">Give Auth Permissions</button>
                    </div>
                    <!-- Add Registras Auth Permissions Modal -->
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
                                                <div class="form-group col-md-12">
                                                    <label for="">User Email</label>
                                                    <select type="text" required name="auth_email" id="AuthUserEmail" onchange="getAuthUserName(this.value);" class="form-control basic">
                                                        <option>Select User Email</option>
                                                        <?php
                                                        /* Select Users Which Has No Auth Permissions Or Auth Permissions Are Revoked */
                                                        $ret = "SELECT * FROM `users` WHERE auth_status != 'Can_Login' ";
                                                        $stmt = $mysqli->prepare($ret);
                                                        $stmt->execute(); //ok
                                                        $res = $stmt->get_result();
                                                        while ($Users = $res->fetch_object()) {
                                                        ?>
                                                            <option><?php echo $Users->email; ?></option>

                                                        <?php } ?>
                                                    </select>
                                                    <!-- Hide This -->
                                                    <input type="hidden" required name="auth_id" value="<?php echo $ID; ?>" class="form-control">
                                                    <input type="hidden" required name="auth_status" value="Can_Login" class="form-control">
                                                    <input type="text" required name="user_id" id="AuthUserId" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-8">
                                                    <label for="">Auth Password</label>
                                                    <input type="password" required name="auth_password" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Auth Permissions</label>
                                                    <select type="text" required name="auth_permission" class="form-control basic">
                                                        <option value="0">Registrar</option>
                                                        <option value="1">Administrator</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="add_auth_permission" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Add Registras Auth Permissions Modal -->

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
                                    $ret = "SELECT * FROM `users` WHERE auth_status = 'Can_Login' ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    while ($AuthUsers = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $AuthUsers->name; ?></td>
                                            <td><?php echo $AuthUsers->national_idno; ?></td>
                                            <td><?php echo $AuthUsers->sex; ?></td>
                                            <td><?php echo $AuthUsers->email; ?></td>
                                            <td><?php echo $AuthUsers->phone; ?></td>
                                            <td><?php echo $AuthUsers->addr; ?></td>
                                            <td>

                                                <a class="badge badge-danger" data-toggle="modal" href="#revoke-<?php echo $AuthUsers->id; ?>">
                                                    <i class="fas fa-trash"></i>
                                                    Revoke Auth Permissions
                                                </a>
                                                <!-- Revoke Auth Permission Modal -->
                                                <div class="modal fade" id="revoke-<?php echo $AuthUsers->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">CONFIRM</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center text-danger">
                                                                <h4>Revoke <br> <?php echo $AuthUsers->name; ?> <br> Authentication Permissions ?</h4>
                                                                <br>
                                                                <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                                                                <a href="user_permissions.php?revoke=<?php echo $AuthUsers->id; ?>&auth_status=Revoked" class="text-center btn btn-danger"> Revoke </a>
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
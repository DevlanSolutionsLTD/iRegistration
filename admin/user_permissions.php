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
                                                    <select type="text" required name="auth_email" id="AuthUserEmail" class="form-control basic">
                                                        <option>Select User Email</option>

                                                        <option></option>

                                                    </select>
                                                    <!-- Hide This -->
                                                    <input type="hidden" required name="auth_id" value="<?php echo $ID; ?>" class="form-control">
                                                    <input type="hidden" required name="auth_status" value="Can_Login" class="form-control">

                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Name</label>
                                                    <input type="text" id="AuthUserName" required name="national_idno" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="">Auth Password</label>
                                                    <input type="password" required name="auth_password" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="">Auth Permissions</label>
                                                    <select type="text" required name="sex" class="form-control basic">
                                                        <option value="1">Administrator</option>
                                                        <option value="0">Registrar</option>
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
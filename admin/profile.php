<?php
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../partials/analytics.php');
check_login();

/* Update Logged In User */
if (isset($_POST['update_profile'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;

    if (isset($_POST['national_idno']) && !empty($_POST['national_idno'])) {
        $national_idno = mysqli_real_escape_string($mysqli, trim($_POST['national_idno']));
    } else {
        $error = 1;
        $err = "National ID / Passport Number Cannot Be Empty";
    }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
    } else {
        $error = 1;
        $err = "Email Cannot Be Empty";
    }
    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
        $phone = mysqli_real_escape_string($mysqli, trim($_POST['phone']));
    } else {
        $error = 1;
        $err = "Phone Number Cannot Be Empty";
    }

    if (!$error) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $national_idno  = $_POST['national_idno'];
        $addr = $_POST['addr'];
        $sex = $_POST['sex'];
        $updated_at = date('d M Y');

        $query = "UPDATE  users SET name =?, email =?, phone =?, national_idno =?, addr =?, sex =?, updated_at = ? WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('ssssssss', $name, $email, $phone, $national_idno, $addr, $sex, $updated_at, $id);
        $stmt->execute();
        if ($stmt) {
            $success = "Updated" && header("refresh:1; url=profile.php");
        } else {
            //inject alert that profile update task failed
            $info = "Please Try Again Or Try Later";
        }
    }
}
/* Change Auth Details */
require_once('../partials/head.php');
?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <?php
        require_once('../partials/navigation.php');
        /* Use Auth Id And Auth Email To Get Details Of Logged In User */
        $auth_id = $_SESSION['auth_id'];
        $ret = "SELECT * FROM `users`  WHERE auth_id = '$auth_id'  ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($logged_in_user = $res->fetch_object()) {
        ?>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-left text-dark"><?php echo $logged_in_user->name; ?> Profile</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="container">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-3">
                                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#user_information" role="tab" aria-controls="vert-tabs-home" aria-selected="true">User Information</a>
                                            <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#auth_settings" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Auth Settings</a>
                                        </div>
                                    </div>
                                    <div class="col-7 col-sm-9">
                                        <div class="tab-content" id="vert-tabs-tabContent">
                                            <div class="tab-pane text-left fade show active" id="user_information" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                                <form method="post" enctype="multipart/form-data" role="form">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="">Name</label>
                                                            <input type="text" required name="name" value="<?php echo $logged_in_user->name; ?>" class="form-control" id="exampleInputEmail1">
                                                            <input type="hidden" required name="id" value="<?php echo $logged_in_user->id; ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="">ID / Passport Number</label>
                                                            <input type="text" required name="national_idno" value="<?php echo $logged_in_user->national_idno; ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="">Email</label>
                                                            <input type="email" required name="email" value="<?php echo $logged_in_user->email; ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="">Phone Number</label>
                                                            <input type="text" required name="phone" value="<?php echo $logged_in_user->phone; ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="">Gender</label>
                                                            <select type="text" required name="sex" class="form-control basic">
                                                                <option><?php echo $logged_in_user->sex; ?></option>
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="exampleInputPassword1">Address</label>
                                                            <textarea required name="addr" rows="5" class="form-control"><?php echo $logged_in_user->addr; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="submit" name="update_profile" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="auth_settings" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                                <form method="post" enctype="multipart/form-data" role="form">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="">Name</label>
                                                            <input type="text" required name="name" value="<?php echo $logged_in_user->name; ?>" class="form-control" id="exampleInputEmail1">
                                                            <input type="hidden" required name="id" value="<?php echo $logged_in_user->id; ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="">ID / Passport Number</label>
                                                            <input type="text" required name="national_idno" value="<?php echo $logged_in_user->national_idno; ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="">Email</label>
                                                            <input type="email" required name="email" value="<?php echo $logged_in_user->email; ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="">Phone Number</label>
                                                            <input type="text" required name="phone" value="<?php echo $logged_in_user->phone; ?>" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="">Gender</label>
                                                            <select type="text" required name="sex" class="form-control basic">
                                                                <option><?php echo $logged_in_user->sex; ?></option>
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="exampleInputPassword1">Address</label>
                                                            <textarea required name="addr" rows="5" class="form-control"><?php echo $logged_in_user->addr; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="submit" name="update_auth_settings" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php require_once('../partials/footer.php');
        } ?>
    </div>
    <!-- REQUIRED SCRIPTS -->
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>
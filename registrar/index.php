<?php
session_start();
include('../config/config.php');

if (isset($_POST['login'])) {
    $auth_email = $_POST['auth_email'];
    $auth_permission = 'Registrar';
    $auth_password = sha1(md5($_POST['auth_password'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT auth_email, auth_password, auth_permission, auth_id  FROM authentication  WHERE auth_email =? AND auth_password =? AND auth_permission = ?");
    $stmt->bind_param('ssi', $auth_email, $auth_password, $auth_permission); //bind fetched parameters
    $stmt->execute(); //execute bind 
    $stmt->bind_result($auth_email, $auth_password, $auth_permission, $auth_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['auth_id'] = $auth_id;
    $_SESSION['auth_email'] = $auth_email;
    if ($rs) {
        header("location:dashboard.php");
    } else {
        $err = "Access Denied Please Check Your Credentials";
    }
}


require_once('../partials/head.php');
?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="index.php"><b>i</b>Registration</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to iRegistration</p>
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="auth_email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="auth_password" class="form-control" placeholder="Password">
                        <input type="hidden" name="auth_permission" value="1" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <!-- <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div> -->
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">
                    <a href="reset-pwd.php">I forgot my password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="dashboard.php" class="navbar-brand">
            <img src="../public/dist/img/AdminLTELogo.png" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">iRegistration</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link">Home</a>
                </li>
                <?php
                /* Only System Admins Or Users Which Has A Can Touch This */
                $auth_id = $_SESSION['auth_id'] ;
                $ret = "SELECT * FROM `authentication` WHERE auth_id ='$auth_id' AND auth_permission = '1' ";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                while ($AllowedUser = $res->fetch_object()) {
                ?>
                    <li class="nav-item">
                        <a href="registras.php" class="nav-link">Registras</a>
                    </li>
                <?php
                } ?>

                <li class="nav-item">
                    <a href="births_registration.php" class="nav-link">Births Registration</a>
                </li>
                <li class="nav-item">
                    <a href="deaths_registration.php" class="nav-link">Deaths Registration</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Certificates</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="birth_certificates.php" class="dropdown-item">Birth Certificates</a></li>
                        <li><a href="death_certificates.php" class="dropdown-item">Death Certificates</a></li>
                        <li><a href="burial_permits.php" class="dropdown-item">Burial Permits</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Reports</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="birth_rates.php" class="dropdown-item">Birth Rates</a></li>
                        <li><a href="death_rates.php" class="dropdown-item">Death Rates</a></li>
                        <li><a href="population_density.php" class="dropdown-item">Population Density</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="profile.php" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2"></i> Profile Settings
                    </a>
                    <a href="logout.php" class="dropdown-item">
                        <i class="fas fa-power-off mr-2"></i> Log Out
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
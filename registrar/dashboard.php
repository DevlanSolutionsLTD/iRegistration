<?php
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../partials/analytics.php');
registrar_check_login();
require_once('../partials/head.php');
?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <?php require_once('../partials/navigation.php'); ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-center text-dark">iRegistration - Births And Deaths Registration Information System</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <div class="row">

                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-baby"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Registered Births</span>
                                    <span class="info-box-number">
                                        <?php echo $registered_births; ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cross"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Registered Deaths</span>
                                    <span class="info-box-number">
                                        <?php echo $registered_deaths; ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-tie"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Registras</span>
                                    <span class="info-box-number">
                                        <?php echo $registras; ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Death And Births Rate Chart -->
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Overall Births And Deaths Registration</h3>
                                </div>
                                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>

                        <!-- Death And Births Rate Chart -->
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Age Sets Mortality Rate As Reported In <?php echo date('Y'); ?></h3>
                                </div>
                                <canvas id="mortalityRate" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>

                        <!-- Montly Mortality Rates And Birth rates -->
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Monthly Mortalities And Births In <?php echo date('Y'); ?></h3>
                                </div>
                                <div id="MortalityRatesXBirthRates" style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%;"></div>
                            </div>
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
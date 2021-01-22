<?php
session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
require_once('../partials/analytics.php');
check_login();
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
                            <h1 class="m-0 text-center text-dark">Birth Rates, Mortality Rates And Population Density As Reported In <?php echo date('Y');?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container">
                    <div class="row">
                        <!-- Death And Births Rate Chart -->
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Overall Mortality Rates And Birth Rates</h3>
                                </div>
                                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>

                        <!-- Death And Births Rate Chart -->
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Age Sets Mortality Rate</h3>
                                </div>
                                <canvas id="mortalityRate" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>

                        <!-- Montly Mortality Rates And Birth rates -->
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Monthly Mortalities And Births Rates In <?php echo date('Y'); ?></h3>
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
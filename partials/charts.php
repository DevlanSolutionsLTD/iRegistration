<script src="../public/plugins/chart.js/Chart.min.js"></script>
<script src="../public/plugins/chart.js/canvas.js"></script>
<!-- Load Analytics -->
<?php require_once('analytics.php'); ?>

<!-- Load Charts With Data From Analytics Partials -->
<script>
    $(function() {
        /* 
         * ---------------
         *  Births Aganist Deaths Rate Chart
         * _______________
         */

        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Births',
                'Deaths',
            ],
            datasets: [{
                data: [<?php echo $registered_births; ?>, <?php echo $registered_deaths; ?>],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        /* Mortality Rate Based On Given Number Of Age Sets */

        var MotalityRate = $('#mortalityRate').get(0).getContext('2d')
        var AgeSets = {
            labels: [
                '0  - 10 Yrs',
                '20 - 30 Yrs',
                '40 - 50 Yrs',
                '60 - 70 Yrs',
                '80 - 90 Yrs',
                '90 And Above Yrs'
            ],
            datasets: [{
                data: [<?php echo $SetOne; ?>, <?php echo $SetTwo; ?>, <?php echo $SetThree; ?>, <?php echo $SetFour; ?>, <?php echo $SetFive; ?>, <?php echo $SetSix; ?>],
                backgroundColor: ['#f56954', '#00a65a', '#690e89', '#DAF7A6', '#DFFF00', ''],
            }]
        }
        var MotalityRateOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        var MotalityRate = new Chart(MotalityRate, {
            type: 'doughnut',
            data: AgeSets,
            options: MotalityRateOptions
        })
        /* Line And Bar Graph */


    })

    window.onload = function() {

        var chart = new CanvasJS.Chart("MortalityRatesXBirthRates", {
            animationEnabled: true,
            theme: "light2",
            axisX: {
                valueFormatString: "MMM"
            },
            axisY: {
                prefix: "",
                labelFormatter: addSymbols
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                    /* Mortality Rate On Columns */
                    type: "column",
                    name: "Mortality Rate",
                    showInLegend: true,
                    xValueFormatString: "MMMM YYYY",
                    yValueFormatString: "#,##0",
                    dataPoints: [{
                            x: new Date(<?php echo date('Y'); ?>, 0),
                            y: <?php echo $jan; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 1),
                            y: <?php echo $feb; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 2),
                            y: <?php echo $mar; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 3),
                            y: <?php echo $apr; ?>,
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 4),
                            y: <?php echo $may; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 5),
                            y: <?php echo $jun; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 6),
                            y: <?php echo $jul; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 7),
                            y: <?php echo $aug; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 8),
                            y: <?php echo $sep; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 9),
                            y: <?php echo $oct; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 10),
                            y: <?php echo $nov; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 11),
                            y: <?php echo $dec; ?>
                        }
                    ]
                },
                {
                    type: "line",
                    /* Birth Rates On Line */
                    name: "Birth Rates",
                    showInLegend: true,
                    yValueFormatString: "#,##0",
                    dataPoints: [{
                            x: new Date(<?php echo date('Y'); ?>, 0),
                            y: <?php echo $Jan; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 1),
                            y: <?php echo $Feb; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 2),
                            y: <?php echo $Mar; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 3),
                            y: <?php echo $Apr; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 4),
                            y: <?php echo $May; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 5),
                            y: <?php echo $Jun; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 6),
                            y: <?php echo $Jul; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 7),
                            y: <?php echo $Aug; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 8),
                            y: <?php echo $Sep; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 9),
                            y: <?php echo $Oct; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 10),
                            y: <?php echo $Nov; ?>
                        },
                        {
                            x: new Date(<?php echo date('Y'); ?>, 11),
                            y: <?php echo $Dec; ?>
                        }
                    ]
                }
            ]
        });
        chart.render();

        function addSymbols(e) {
            var suffixes = ["", "K", "M", "B"];
            var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);

            if (order > suffixes.length - 1)
                order = suffixes.length - 1;

            var suffix = suffixes[order];
            return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
        }

        function toggleDataSeries(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }

    }
</script>
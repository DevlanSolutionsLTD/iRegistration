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
                data: [<?php echo $SetOne; ?>, <?php echo $SetTwo; ?>, <?php echo $SetThree;?>, <?php echo $SetFour;?>, <?php echo $SetFive;?>, <?php echo $SetSix;?>],
                backgroundColor: ['#f56954', '#00a65a', '#690e89','#DAF7A6', '#DFFF00', ''],
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

    })
    
</script>
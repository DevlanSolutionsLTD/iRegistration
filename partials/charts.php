<script src="../public/plugins/chart.js/Chart.min.js"></script>
<script src="../public/plugins/chart.js/canvas.js"></script>
<!-- Load Analytics -->
<?php require_once('analytics.php'); ?>

<!-- Load Charts With Data From Analytics Partials -->
<script>
    $(function() {
        /* 
         * -------
         *  Births Aganist Deaths Rate Chart
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

    })
</script>
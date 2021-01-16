<script src="../public/plugins/chart.js/Chart.min.js"></script>
<!-- Load Charts -->
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
                data: [700, 500],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })



    })
</script>
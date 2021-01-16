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
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        //-------------
        //- LINE CHART -
        //--------------
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Music Album Sales by Year"
                },
                axisY: {
                    title: "Units Sold",
                    valueFormatString: "#0,,.",
                    suffix: "mn",
                    stripLines: [{
                        value: 3366500,
                        label: "Average"
                    }]
                },
                data: [{
                    yValueFormatString: "#,### Units",
                    xValueFormatString: "YYYY",
                    type: "spline",
                    dataPoints: [{
                            x: new Date(2002, 0),
                            y: 2506000
                        },
                        {
                            x: new Date(2003, 0),
                            y: 2798000
                        },
                        {
                            x: new Date(2004, 0),
                            y: 3386000
                        },
                        {
                            x: new Date(2005, 0),
                            y: 6944000
                        },
                        {
                            x: new Date(2006, 0),
                            y: 6026000
                        },
                        {
                            x: new Date(2007, 0),
                            y: 2394000
                        },
                        {
                            x: new Date(2008, 0),
                            y: 1872000
                        },
                        {
                            x: new Date(2009, 0),
                            y: 2140000
                        },
                        {
                            x: new Date(2010, 0),
                            y: 7289000
                        },
                        {
                            x: new Date(2011, 0),
                            y: 4830000
                        },
                        {
                            x: new Date(2012, 0),
                            y: 2009000
                        },
                        {
                            x: new Date(2013, 0),
                            y: 2840000
                        },
                        {
                            x: new Date(2014, 0),
                            y: 2396000
                        },
                        {
                            x: new Date(2015, 0),
                            y: 1613000
                        },
                        {
                            x: new Date(2016, 0),
                            y: 2821000
                        },
                        {
                            x: new Date(2017, 0),
                            y: 2000000
                        }
                    ]
                }]
            });
            chart.render();

        }

    })
</script>
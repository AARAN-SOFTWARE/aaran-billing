<div>
    <canvas id="myChart" style=""></canvas>
    <script>
        var xValues = ["Apl", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar"];

        var yValues = [700900, 1060070, 560000, 903400, 709400, 132400, 803390, 347000, 403400, 801500, 609900, 303400]

        var barColors = ["#23B7E5", "#23B7E5", "#23B7E5", "#23B7E5", "#23B7E5", "#23B7E5", "#23B7E5", "#23B7E5", "#23B7E5", "#23B7E5", "#23B7E5", "#23B7E5"];

        new Chart("myChart", {
            type: "bar"

            , data: {
                labels: xValues
                , datasets: [{
                    data: yValues
                    , backgroundColor: barColors,

                }]
            }
            , options: {
                legend: {
                    display: false
                }
                , scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                , }
            }
        });

    </script>
</div>

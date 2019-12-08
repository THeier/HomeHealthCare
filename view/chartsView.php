<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'view/header.php'; ?>


<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script src="Chart.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js'></script>
    </head>  
    <body>
        <div class="form-row">
        <div class="chart-container justify-content-center">
        <canvas id="myChart" width="10%" height="10%">
            </div>
            </div>
            <script>
               
                var ctx = document.getElementById('myChart').getContext('2d');
                ctx.width =500;
                ctx.height =300;
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'pie',

                        // The data for our dataset
                        data: {
                            labels: ['Active', 'Inactive'],
                            datasets: [{
                                label: 'User Chart',
                                backgroundColor: 'rgb(100, 99, 120)',
                                borderColor: 'rgb(255, 99, 132)',
                                data: <?php echo json_encode($myData, JSON_NUMERIC_CHECK); ?>,
                            }]
                        },

                        // Configuration options go here
                        options: {}
});  
            </script>
        </body>
    
</html>


<?php include 'view/footer.php'; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'view/header.php'; ?>


<html>
    <head>
        <script src="Chart.js"></script>
    </head>  
    <body>
        <canvas id="mycanvas" width="256" height="256">
            <script>
                $(document).ready(function(){
                    var ctx = document.getElementById('mycanvas').getContext('2d');
                    
                    var data[
                        {
                            value: 270;
                            color: "blue",
                            hightlight: "lightskyblue",
                            label: "Active Users"
                            
                        },
                        {
                            value: 90;
                            color: "blue",
                            hightlight: "lightskyblue",
                            label: "Inactive Users"
                        }
                ];
                
                var piechart = new Chart(ctx).Pie(data);
                                  
          });       
            </script>
        </body>
    
</html>
<body>
    <div class="chart">
    

    <script>
        
        // mydata will come form the sql done to 
        var mydata ='';
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Number of Patients by Month',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [0, 10, 5, 2, 20, 30, 45]
                    }]
            },

            // Configuration options go here
            options: {}
        });

    </script>
    </div>

</body>

<?php include 'view/footer.php'; ?>
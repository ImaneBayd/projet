<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['employe'])) {
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container-fluid" style="margin-top: 5%;">
        <div class="">
            <p class="h2 text-center text-dark text-uppercase font-weight-bold">Statistiques des classes</p>
            <hr class="line-seprate">
            <section class="statistic statistic2">
                <div class="row">
                    <canvas id="myChart" width="200" height="100"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        
                         $.ajax({
                            url:'controller/gestionClasse.php',
                            data: {op: 'count'},
                            type: 'POST',
                           
                             success: function (data, textStatus, jqXHR) { 
                               x=[1,2,3];
                               y=[4,5,7];
                                 var x = Array();
                                 var y = Array();
                                 console.log(data);
                                 data.forEach(function(e) {
                                       
                                        x.push(e.fil);
                                        y.push(e.nbr);
                                    });
                                 showGraph(x, y);
                                },
                             error: function (jqXHR, textStatus, errorThrown){
                                 console.log(textStatus);
                                 
                             }
                            
                        });
                        function showGraph(x, y){
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: x,
                                datasets: [{
                                        
                                        data: y,
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 2
                                    }]
                            },
                            options: {
                                plugins: {
                                
                                    title: {
                                        display: true,
                                        text: 'Nombre de classes par filiere'
                                    }
                                },
                                scales: {
                                    x: {
                                        title:{
                                        display: true,
                                        text: 'Filieres'
                                    }
                                    },
                                    y: {
                                        title:{
                                        display: true,
                                        text: 'classes'
                                    }
                                }
                                }
                            }
                        });
                    }
                    </script>



                </div>
            </section>
        </div>
    </div>
   
    <?php

} else {
    header("Location: ../index.php");
}
?>
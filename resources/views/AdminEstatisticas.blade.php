@extends('layouts.layoutA')

@section('title', 'Cogitavi - Administrador')

@section('content')

<section class="bgColor">
    <div class="container py-3">

      <div class="col-12">
        <h2 class="mb-3">Estatísticas</h2>
      </div>

    <div class="container mt-5">

        <div class="row my-5 justify-content-center">

            <div class="chart-container cc col-md-5 col-lg-5 col-xl-5">
                <h4 class="text-center">Objetos</h4>
                <canvas id="barChartObjs"></canvas>
            </div>

            <div class="chart-container cc col-md-5 col-lg-5 col-xl-5 ms-5">
                <h4 class="text-center">Utilizadores</h4>
                <canvas id="doughnutChartUsers"></canvas>
            </div>

        </div>


      <div class="row my-5 justify-content-center">

        <div class="chart-container cc col-md-5 col-lg-5 col-xl-5">
          <h4 class="text-center">Objetos Reclamados e Remanescentes</h4>
          <canvas id="pieChartCorres"></canvas>
        </div>

        <div class="chart-container cc col-md-5 col-lg-5 col-xl-5 ms-5">
          <h4 class="text-center">Leilões</h4>
          <canvas id="barChartLeiloes"></canvas>
        </div>

      </div>
      
    </div>

    <script>
let pedidoAtributo = new XMLHttpRequest();
pedidoAtributo.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        dados = JSON.parse(pedidoAtributo.responseText);
        console.log(dados.number_obj_rel);
        var ctx = document.getElementById('barChartObjs').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Perdidos', 'Encontrados', 'Reclamados', 'Entregues', 'Leiloados', 'Vendidos'],
                datasets: [{
                    label: 'Quantidade de objetos',
                    data: [dados.number_obj_per, dados.number_obj_enc, dados.number_obj_rel, dados.number_obj_rel_entregues, dados.number_leilao, dados.number_leilao_acabado],
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
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 5,
                            precision: 0 // Ensures that only integer values are displayed
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.raw;
                            }
                        }
                    }
                }
            }
        });
    }
}
pedidoAtributo.open("GET", "/api/avaliador/1/stats1", true);
pedidoAtributo.send();

</script>

    <script>
        let pedido2 = new XMLHttpRequest();
        pedido2.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                dados2 = JSON.parse(pedido2.responseText);
                console.log(dados2);
                const ctx = document.getElementById('doughnutChartUsers').getContext('2d');
                const doughnutChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Dono e Licitante', 'Policia'],
                        datasets: [{
                            label: 'Dataset',
                            data: [dados2.number_regular, dados2.number_policia],
                            backgroundColor: ['#099a76', '#104c91'],
                            hoverBackgroundColor: ['#0bae8e', '#1c5aaf']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        legend: {
                            position: 'top',
                        },
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        }
                    }
                });
            }
        }
        pedido2.open("GET", "/api/avaliador/1/stats2", true);
        pedido2.send();
        
            
        </script>

    <script>
        let pedido3 = new XMLHttpRequest();
        pedido3.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                dados3 = JSON.parse(pedido3.responseText);
                const ctx2 = document.getElementById('pieChartCorres').getContext('2d');
                const myPieChart = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: ['Reclamados', 'Remanescentes'],
                    datasets: [{
                        data: [dados3.number_objeto_c, dados3.number_objeto-dados3.number_objeto_c],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.raw !== null) {
                                        label += context.raw;
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
                });
            }
        }
        pedido3.open("GET", "/api/avaliador/1/stats3", true);
        pedido3.send();
            
    </script>

    <script>
let pedido4 = new XMLHttpRequest();
pedido4.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let dados4 = JSON.parse(pedido4.responseText);
        let ctx = document.getElementById('barChartLeiloes').getContext('2d');
        let myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total', 'Ativos', 'Passados', 'Futuros'],
                datasets: [{
                    label: 'Quantidade de Leilões',
                    data: [dados4.number_leiloes, dados4.number_leiloes_ativos, dados4.number_leiloes_passados, dados4.number_leiloes_futuros],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            precision: 0 // Ensures that only integer values are displayed
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.raw;
                            }
                        }
                    }
                }
            }
        });
    }
}
pedido4.open("GET", "/api/avaliador/1/stats4", true);
pedido4.send();

    </script>



</div>
    
</section>

@endsection


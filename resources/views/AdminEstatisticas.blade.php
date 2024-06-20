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
          <h4 class="text-center">Correspondências entre Objetos</h4>
          <canvas id="pieChartCorres"></canvas>
        </div>

        <div class="chart-container cc col-md-5 col-lg-5 col-xl-5 ms-5">
          <h4 class="text-center">Leilões</h4>
          <canvas id="barChartLeiloes"></canvas>
        </div>

      </div>
      
    </div>

    <script>
        var ctx = document.getElementById('barChartObjs').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Perdidos', 'Encontrados', 'Correspondidos', 'Entregues', 'Leiloados', 'Vendidos'],
                datasets: [{
                    label: 'Quantidade de objetos',
                    data: [300, 247, 20, 17, 59, 56],
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
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const ctx = document.getElementById('doughnutChartUsers').getContext('2d');
                const doughnutChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Dono e Licitante', 'Policia'],
                        datasets: [{
                            label: 'Dataset',
                            data: [300, 50],
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
            });
        </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('pieChartCorres').getContext('2d');
            const myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Correspondidos', 'Remanescentes'],
                    datasets: [{
                        data: [12, 19],
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
        });
    </script>

    <script>
        var ctx = document.getElementById('barChartLeiloes').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total', 'Ativos', 'Passados', 'Futuros'],
                datasets: [{
                    label: 'Quantidade de Leilões',
                    data: [300, 247, 20, 17, 59, 56],
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
                        beginAtZero: true
                    }
                }
            }
        });
    </script>



</div>
    
</section>

@endsection


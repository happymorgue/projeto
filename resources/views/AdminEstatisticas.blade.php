@extends('layouts.layoutA')

@section('title', 'Cogitavi - Administrador')

@section('content')

<section class="bgColor">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12">
        <h3 class="mb-3">Estatísticas</h3>
      </div>
    </div>


    <div class="container mt-5">

        <div class="chart-container col-md-5 col-lg-5 col-xl-5">
            <h3 class="text-center">Objetos</h3>
            <canvas id="barChartObjs"></canvas>
        </div>

        <div class="chart-container col-md-5 col-lg-5 col-xl-5">
            <h3 class="text-center">Utilizadores</h3>
            <canvas id="doughnutChartUsers"></canvas>
        </div>

    </div>

    <script>
        var ctx = document.getElementById('barChartObjs').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Perdidos', 'Encontrados', 'Correspondidos', 'Entregues', 'Leiloados', 'Vendidos'],
                datasets: [{
                    label: 'Número de objetos',
                    data: [12, 19, 3, 5, 2, 3],
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
                    labels: ['Red', 'Blue', 'Yellow'],
                    datasets: [{
                        label: 'Dataset 1',
                        data: [300, 50, 100],
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                        hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
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



</div>
    
</section>

@endsection


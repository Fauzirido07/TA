@extends('layouts.app')

@section('title', 'Monitoring Asesmen Siswa')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto;">

    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mb-4">
            ⬅ Kembali ke Dashboard
        </a>
    </div>

    <h2 class="mb-4 text-center">📊 Monitoring Asesmen Siswa</h2>

    {{-- Chart Bar --}}
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        <canvas id="chartAsesmen" style="max-height: 300px;"></canvas>
    </div>

    <h4 class="mb-3 text-center">Persentase Asesmen</h4>
    <div class="d-flex justify-content-center shadow-sm p-3 bg-white rounded">
        <canvas id="pieAsesmen" style="max-height: 250px;"></canvas>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script>
    // Bar Chart
    const ctxBar = document.getElementById('chartAsesmen').getContext('2d');
    const barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Laki-laki - Sudah', 'Perempuan - Sudah', 'Laki-laki - Belum', 'Perempuan - Belum'],
            datasets: [{
                label: 'Jumlah Siswa',
                data: [
                    {{ $sudahAsesmenL }},
                    {{ $sudahAsesmenP }},
                    {{ $belumAsesmenL }},
                    {{ $belumAsesmenP }}
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.3)',
                    'rgba(255, 99, 132, 0.3)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision:0
                    }
                }
            }
        }
    });

    // Pie Chart
    const ctxPie = document.getElementById('pieAsesmen').getContext('2d');
    const pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Sudah Diasesmen', 'Belum Diasesmen'],
            datasets: [{
                data: [
                    {{ $total_sudah }},
                    {{ $total_belum }}
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 159, 64, 0.7)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                datalabels: {
                    formatter: (value, context) => {
                        let sum = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                        let percentage = (value * 100 / sum).toFixed(1) + "%";
                        return percentage;
                    },
                    color: '#fff',
                    font: {
                        weight: 'bold',
                        size: 12
                    }
                },
                legend: {
                    position: 'bottom'
                }
            }
        },
        plugins: [ChartDataLabels]
    });
</script>
@endsection

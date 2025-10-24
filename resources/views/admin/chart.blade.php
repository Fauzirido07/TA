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

    {{-- Chart Bar Asesmen --}}
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
        <canvas id="chartAsesmen" style="max-height: 300px;"></canvas>
    </div>

    {{-- Chart Pie Status Pendaftaran --}}
    <h4 class="text-center mb-3">📋 Status Pendaftaran Siswa</h4>
    <div class="shadow-sm p-3 mb-5 bg-white rounded text-center">
        <canvas id="chartStatus" style="max-width: 400px; max-height: 300px; margin: 0 auto;"></canvas>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script>
    // === CHART ASESMEN (BAR) ===
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
                    ticks: { precision: 0 }
                }
            }
        }
    });

    // === CHART STATUS PENDAFTARAN (PIE) ===
    const ctxPie = document.getElementById('chartStatus').getContext('2d');
    const statusChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Pending', 'Diproses', 'Diterima', 'Ditolak'],
            datasets: [{
                data: [
                    {{ $counts['pending'] ?? 0 }},
                    {{ $counts['diproses'] ?? 0 }},
                    {{ $counts['diterima'] ?? 0 }},
                    {{ $counts['ditolak'] ?? 0 }}
                ],
                backgroundColor: [
                    '#f39c12',
                    '#3498db',
                    '#2ecc71',
                    '#e74c3c'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const dataset = context.dataset.data;
                            const total = dataset.reduce((a, b) => a + b, 0);
                            const value = context.parsed;
                            const percent = ((value / total) * 100).toFixed(1);
                            return `${context.label}: ${value} (${percent}%)`;
                        }
                    }
                }
            }
        }
    });
</script>
@endsection

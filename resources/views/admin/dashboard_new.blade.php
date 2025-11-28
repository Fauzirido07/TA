@extends('layouts.apps')

@section('title', 'Dashboard Admin')

@section('content')
<div class="row">

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon text-bg-primary shadow-sm">
                <i class="bi bi-people-fill"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Pendaftar SD</span>
                <span class="info-box-number">{{$pendaftarCounts['sd']}}/{{$pendaftarCounts['total']}}</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon text-bg-primary shadow-sm">
                <i class="bi bi-people-fill"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Pendaftar SMP</span>
                <span class="info-box-number">{{$pendaftarCounts['smp']}}/{{$pendaftarCounts['total']}}</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon text-bg-primary shadow-sm">
                <i class="bi bi-people-fill"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Pendaftar SMA</span>
                <span class="info-box-number">{{$pendaftarCounts['sma']}}/{{$pendaftarCounts['total']}}</span>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <h3>Pendaftar Yang Belum DiAsesmen</h3>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon text-bg-warning shadow-sm">
                <i class="bi bi-people-fill"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">SD</span>
                <span class="info-box-number">{{$belumAsesmenCounts['sd']}}/{{$belumAsesmenCounts['total']}}</span>
            </div>
        </div>
    </div>
        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon text-bg-warning shadow-sm">
                <i class="bi bi-people-fill"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">SMP</span>
                <span class="info-box-number">{{$belumAsesmenCounts['smp']}}/{{$belumAsesmenCounts['total']}}</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon text-bg-warning shadow-sm">
                <i class="bi bi-people-fill"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">SMA</span>
                <span class="info-box-number">{{$belumAsesmenCounts['sma']}}/{{$belumAsesmenCounts['total']}}</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h4 class="text-center mb-3">Jumlah Pendaftar</h4>
        <div class="shadow-sm p-3 mb-5 bg-white rounded text-center">
        <canvas id="chartPendaftar" style=" max-height: 300px; margin: 0 auto;"></canvas>
    </div>
    </div>

    <div class="col-md-6">
        <h4 class="text-center mb-3">Status Administrasi Pendaftar</h4>
        <div class="shadow-sm p-3 mb-5 bg-white rounded text-center">
        <canvas id="chartAdministrasi" style=" max-height: 300px; margin: 0 auto;"></canvas>
    </div>
    </div>

    <div class="col-md-6">
        <h4 class="text-center mb-3">Status Daftar Ulang Pendaftar</h4>
        <div class="shadow-sm p-3 mb-5 bg-white rounded text-center">
        <canvas id="chartDaftarUlang" style=" max-height: 300px; margin: 0 auto;"></canvas>
    </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script>
    const ctxPie = document.getElementById('chartPendaftar').getContext('2d');
    const statusChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: [ 'SD', 'SMP', 'SMA'],
            datasets: [{
                data: [
                    {{ $pendaftarCounts['sd'] ?? 0 }},
                    {{ $pendaftarCounts['smp'] ?? 0 }},
                    {{ $pendaftarCounts['sma'] ?? 0 }}
                ],
                backgroundColor: [
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

    const ctxPieAdministrasi = document.getElementById('chartAdministrasi').getContext('2d');
    const statusChartAdministrasi = new Chart(ctxPieAdministrasi, {
        type: 'pie',
        data: {
            labels: ['Sudah', 'Belum'],
            datasets: [{
                data: [
                    {{ $administrasiCounts['sudah'] ?? 0 }},
                    {{ $administrasiCounts['belum'] ?? 0 }},
                ],
                backgroundColor: [
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

    const ctxPieDaftarUlang = document.getElementById('chartDaftarUlang').getContext('2d');
    const daftarUlangChart = new Chart(ctxPieDaftarUlang, {
        type: 'pie',
        data: {
            labels: [ 'SD', 'SMP', 'SMA'],
            datasets: [{
                data: [
                    {{ $daftarUlangCounts['sd'] ?? 0 }},
                    {{ $daftarUlangCounts['smp'] ?? 0 }},
                    {{ $daftarUlangCounts['sma'] ?? 0 }}
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

@endpush

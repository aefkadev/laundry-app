@extends('layouts.admin.app')

@section('title', 'Chart')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div style="width: 50%">
        <canvas id="pemasukan-pengeluaran"></canvas>
    </div>
    <script>
        var ctx = document.getElementById('pemasukan-pengeluaran').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($pemasukan as $p)
                        '{{ date('F', mktime(0, 0, 0, $p->month, 1)) }}',
                    @endforeach
                ],
                datasets: [
                    {
                        label: 'Pemasukan',
                        data: [
                            @foreach ($pemasukan as $p)
                                {{ $p->total }},
                            @endforeach
                        ],
                        backgroundColor: 'rgba(0, 255, 0, 0.5)',
                        borderColor: 'rgba(0, 255, 0, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Pengeluaran',
                        data: [
                            @foreach ($pengeluaran as $p)
                                {{ $p->total }},
                            @endforeach
                        ],
                        backgroundColor: 'rgba(255, 0, 0, 0.5)',
                        borderColor: 'rgba(255, 0, 0, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@include('admin.menu')
@endsection

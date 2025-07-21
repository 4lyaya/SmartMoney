<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartMoney App - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/sweet-alert.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }

        .apexcharts-tooltip {
            background: #f8fafc !important;
            color: #1e293b !important;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-green-600 text-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="/" class="text-xl font-bold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                SmartMoney
            </a>
            <div class="flex items-center space-x-4">
                <a href="/dashboard" class="hover:text-green-100 transition duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>
                <a href="/transactions" class="hover:text-green-100 transition duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Transactions
                </a>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-green-100 transition duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-6">
        <div class="space-y-6">
            <!-- Welcome Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Welcome back, {{ $user->name }}!</h1>
                    <p class="mt-1 text-sm text-gray-500">Here's your financial overview</p>
                </div>
                <div class="text-sm text-gray-500">
                    Last updated: {{ now()->format('M d, Y h:i A') }}
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                <!-- Income Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg transition-all hover:shadow-md">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Income</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            {{ 'Rp' . number_format(array_sum($chartData['income']), 0, ',', '.') }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expense Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg transition-all hover:shadow-md">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Expense</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            {{ 'Rp' . number_format(array_sum($chartData['expense']), 0, ',', '.') }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Balance Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg transition-all hover:shadow-md">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Current Balance</dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900">
                                            {{ 'Rp' . number_format(array_sum($chartData['income']) - array_sum($chartData['expense']), 0, ',', '.') }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Financial Overview Chart -->
                <div class="bg-white p-2 rounded-lg shadow transition-all hover:shadow-md min-h-[100px]">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-medium text-gray-900">Financial Overview (Last 6 Months)</h2>
                        <div class="flex space-x-2">
                            <button id="chart-income-btn"
                                class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 hover:bg-green-200 transition-colors">Income</button>
                            <button id="chart-expense-btn"
                                class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 hover:bg-red-200 transition-colors">Expense</button>
                            <button id="chart-both-btn"
                                class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 hover:bg-blue-200 transition-colors">Both</button>
                        </div>
                    </div>
                    <div id="financial-chart"></div>
                </div>

                <!-- Recent Transactions -->
                <div class="bg-white p-2 rounded-lg shadow transition-all hover:shadow-md min-h-[100px]">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-medium text-gray-900">Recent Transactions</h2>
                        <a href="/transactions" class="text-sm text-green-600 hover:text-green-800 flex items-center">
                            View All
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    <div class="space-y-4">
                        @forelse ($transactions as $transaction)
                            <a href="/transactions/{{ $transaction->id }}/edit" class="block">
                                <div
                                    class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg transition duration-150">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="p-2 rounded-full {{ $transaction->type === 'income' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                            @if ($transaction->type === 'income')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">
                                                {{ $transaction->description }}</p>
                                            <p class="text-xs text-gray-500">
                                                {{ $transaction->category }} •
                                                {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('M d') }}
                                            </p>
                                        </div>
                                    </div>
                                    <p
                                        class="text-sm font-medium {{ $transaction->type === 'income' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $transaction->type === 'income' ? '+' : '-' }}Rp{{ number_format($transaction->amount, 0, ',', '.') }}
                                    </p>
                                </div>
                            </a>
                        @empty
                            <p class="text-sm text-gray-500 text-center py-4">No recent transactions</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Monthly Breakdown -->
            <div class="bg-white p-4 rounded-lg shadow transition-all hover:shadow-md">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Monthly Trends</h2>
                <div id="monthly-trends-chart"></div>
            </div>

            <!-- Category Breakdown -->
            {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Income by Category -->
                <div class="bg-white p-6 rounded-lg shadow transition-all hover:shadow-md">
                    <h2 class="text-lg font-medium text-gray-900 mb-4">Income by Category</h2>
                    <div id="income-categories-chart"></div>
                </div>

                <!-- Expense by Category -->
                <div class="bg-white p-6 rounded-lg shadow transition-all hover:shadow-md">
                    <h2 class="text-lg font-medium text-gray-900 mb-4">Expense by Category</h2>
                    <div id="expense-categories-chart"></div>
                </div>
            </div> --}}
        </div>
    </main>

    <!-- Flash Messages for SweetAlert -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chartData = @json($chartData);

            // Format data untuk ApexCharts
            const series = [{
                name: 'Income',
                data: chartData.income,
                color: '#16a34a'
            }, {
                name: 'Expense',
                data: chartData.expense,
                color: '#dc2626'
            }];

            // Financial Chart Options
            const financialChartOptions = {
                series: series,
                chart: {
                    type: 'area',
                    height: 350,
                    stacked: false,
                    toolbar: {
                        show: false,
                        tools: {
                            download: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>',
                            selection: false,
                            zoom: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>',
                            zoomin: false,
                            zoomout: false,
                            pan: false,
                            reset: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path></svg>'
                        },
                        export: {
                            csv: {
                                filename: 'financial-overview',
                                columnDelimiter: ',',
                                headerCategory: 'Month',
                                headerValue: 'Amount ($)',
                            },
                            svg: {
                                filename: 'financial-overview',
                            },
                            png: {
                                filename: 'financial-overview',
                            }
                        }
                    },
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 800,
                        animateGradually: {
                            enabled: true,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 350
                        }
                    },
                    foreColor: '#6b7280'
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded',
                        borderRadius: 4,
                        dataLabels: {
                            position: 'top'
                        }
                    },
                },
                dataLabels: {
                    enabled: false,
                    formatter: function(val) {
                        return '$' + val.toLocaleString();
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#6b7280"]
                    }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: chartData.labels,
                    labels: {
                        style: {
                            colors: '#6b7280',
                            fontSize: '12px',
                            fontFamily: 'Inter, sans-serif'
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                yaxis: {
                    title: {
                        text: 'Amount (Rp)',
                        style: {
                            color: '#6b7280',
                            fontSize: '12px',
                            fontFamily: 'Inter, sans-serif'
                        }
                    },
                    labels: {
                        formatter: function(value) {
                            return 'Rp' + value.toLocaleString('id-ID'); // pakai locale Indonesia
                        },
                        style: {
                            colors: '#6b7280',
                            fontSize: '12px',
                            fontFamily: 'Inter, sans-serif'
                        }
                    }
                },
                fill: {
                    opacity: 1,
                    type: 'solid'
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return 'Rp' + value.toLocaleString('id-ID'); // pakai locale Indonesia
                        }
                    },
                    theme: 'light',
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Inter, sans-serif'
                    },
                    marker: {
                        show: true,
                    },
                    fixed: {
                        enabled: false,
                        position: 'topRight',
                        offsetX: 0,
                        offsetY: 0,
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    fontSize: '14px',
                    fontFamily: 'Inter, sans-serif',
                    markers: {
                        width: 12,
                        height: 12,
                        radius: 12,
                        offsetX: -3
                    },
                    itemMargin: {
                        horizontal: 10,
                        vertical: 5
                    }
                },
                grid: {
                    borderColor: '#e5e7eb',
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    },
                    padding: {
                        top: 0,
                        right: 20,
                        bottom: 0,
                        left: 20
                    }
                },
                responsive: [{
                    breakpoint: 640,
                    options: {
                        chart: {
                            height: 300
                        },
                        legend: {
                            position: 'bottom',
                            horizontalAlign: 'center'
                        }
                    }
                }]
            };

            // Render Financial Chart
            const financialChart = new ApexCharts(document.querySelector("#financial-chart"),
                financialChartOptions);
            financialChart.render();

            // Button Controls
            document.getElementById('chart-income-btn').addEventListener('click', function() {
                financialChart.updateSeries([{
                    name: 'Income',
                    data: chartData.income
                }]);
            });

            document.getElementById('chart-expense-btn').addEventListener('click', function() {
                financialChart.updateSeries([{
                    name: 'Expense',
                    data: chartData.expense
                }]);
            });

            document.getElementById('chart-both-btn').addEventListener('click', function() {
                financialChart.updateSeries(series);
            });

            // Monthly Trends Chart (Line Chart)
            const monthlyTrendsOptions = {
                series: [{
                    name: 'Income',
                    data: chartData.income,
                    color: '#16a34a'
                }, {
                    name: 'Expense',
                    data: chartData.expense,
                    color: '#dc2626'
                }],
                chart: {
                    type: 'line',
                    height: 350,
                    toolbar: {
                        show: false,
                        tools: {
                            download: true,
                            selection: false,
                            zoom: true,
                            zoomin: false,
                            zoomout: false,
                            pan: false,
                            reset: true
                        },
                        export: {
                            csv: {
                                filename: 'monthly-trends',
                                columnDelimiter: ',',
                                headerCategory: 'Month',
                                headerValue: 'Amount ($)',
                            },
                            svg: {
                                filename: 'monthly-trends',
                            },
                            png: {
                                filename: 'monthly-trends',
                            }
                        }
                    },
                    zoom: {
                        enabled: true,
                        type: 'x',
                        autoScaleYaxis: true
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 3,
                    lineCap: 'round'
                },
                markers: {
                    size: 5,
                    hover: {
                        size: 7
                    }
                },
                xaxis: {
                    categories: chartData.labels,
                    labels: {
                        style: {
                            colors: '#6b7280',
                            fontSize: '12px',
                            fontFamily: 'Inter, sans-serif'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return 'Rp' + value.toLocaleString('id-ID'); // pakai locale Indonesia
                        },
                        style: {
                            colors: '#6b7280',
                            fontSize: '12px',
                            fontFamily: 'Inter, sans-serif'
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return 'Rp' + value.toLocaleString('id-ID'); // pakai locale Indonesia
                        }
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right'
                }
            };

            const monthlyTrendsChart = new ApexCharts(document.querySelector("#monthly-trends-chart"),
                monthlyTrendsOptions);
            monthlyTrendsChart.render();

            // Income by Category Pie Chart
            const incomeCategoriesOptions = {
                series: @json(array_column($incomeByCategory, 'total')),
                chart: {
                    type: 'donut',
                    height: 350,
                    toolbar: {
                        show: true,
                        tools: {
                            download: true
                        }
                    }
                },
                labels: @json(array_column($incomeByCategory, 'category')),
                colors: ['#166534', '#16a34a', '#4ade80', '#86efac', '#bbf7d0'],
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    fontSize: '14px',
                    fontFamily: 'Inter, sans-serif'
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total Income',
                                    formatter: function(w) {
                                        return '$' + w.globals.seriesTotals.reduce((a, b) => a + b, 0)
                                            .toLocaleString();
                                    },
                                    color: '#16a34a',
                                    fontSize: '16px',
                                    fontFamily: 'Inter, sans-serif',
                                    fontWeight: 600
                                },
                                value: {
                                    color: '#6b7280',
                                    fontSize: '14px',
                                    fontFamily: 'Inter, sans-serif',
                                    formatter: function(val) {
                                        return '$' + val.toLocaleString();
                                    }
                                },
                                name: {
                                    color: '#6b7280',
                                    fontSize: '12px',
                                    fontFamily: 'Inter, sans-serif'
                                }
                            }
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return '$' + val.toLocaleString();
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val, opts) {
                        return opts.w.config.series[opts.seriesIndex] > 5 ? val.toFixed(1) + '%' : '';
                    },
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Inter, sans-serif',
                        fontWeight: 400
                    },
                    dropShadow: {
                        enabled: false
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: '100%'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            const incomeCategoriesChart = new ApexCharts(document.querySelector("#income-categories-chart"),
                incomeCategoriesOptions);
            incomeCategoriesChart.render();

            // Expense by Category Pie Chart
            const expenseCategoriesOptions = {
                series: @json(array_column($expenseByCategory, 'total')),
                chart: {
                    type: 'donut',
                    height: 350,
                    toolbar: {
                        show: true,
                        tools: {
                            download: true
                        }
                    }
                },
                labels: @json(array_column($expenseByCategory, 'category')),
                colors: ['#991b1b', '#dc2626', '#ef4444', '#f87171', '#fca5a5'],
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    fontSize: '14px',
                    fontFamily: 'Inter, sans-serif'
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                total: {
                                    show: true,
                                    label: 'Total Expense',
                                    formatter: function(w) {
                                        return '$' + w.globals.seriesTotals.reduce((a, b) => a + b, 0)
                                            .toLocaleString();
                                    },
                                    color: '#dc2626',
                                    fontSize: '16px',
                                    fontFamily: 'Inter, sans-serif',
                                    fontWeight: 600
                                },
                                value: {
                                    color: '#6b7280',
                                    fontSize: '14px',
                                    fontFamily: 'Inter, sans-serif',
                                    formatter: function(val) {
                                        return '$' + val.toLocaleString();
                                    }
                                },
                                name: {
                                    color: '#6b7280',
                                    fontSize: '12px',
                                    fontFamily: 'Inter, sans-serif'
                                }
                            }
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return '$' + val.toLocaleString();
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val, opts) {
                        return opts.w.config.series[opts.seriesIndex] > 5 ? val.toFixed(1) + '%' : '';
                    },
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Inter, sans-serif',
                        fontWeight: 400
                    },
                    dropShadow: {
                        enabled: false
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: '100%'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            const expenseCategoriesChart = new ApexCharts(document.querySelector("#expense-categories-chart"),
                expenseCategoriesOptions);
            expenseCategoriesChart.render();
        });
    </script>
</body>

</html>

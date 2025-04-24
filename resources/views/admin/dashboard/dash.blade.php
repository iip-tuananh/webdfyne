@extends('layouts.main')
@section('page_title')
Trang chủ
@endsection

@section('title')
Admin Panel - {{ $config->web_title }}
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/morrisjs/morris.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalOrdersWeek }}</h3>
                    <p>Đơn hàng (7 ngày)</p>
                </div>
                <div class="icon"><i class="fas fa-shopping-cart"></i></div>
                <a href="{{route('orders.index')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Doanh thu tuần -->
    <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ number_format($totalRevenueWeek) }}₫</h3>
                    <p>Doanh thu (7 ngày)</p>
                </div>
                <div class="icon"><i class="fas fa-dollar-sign"></i></div>
                <a href="{{route('orders.index')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Tổng đơn tháng -->
    <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalOrdersMonth }}</h3>
                    <p>Đơn hàng (30 ngày)</p>
                </div>
                <div class="icon"><i class="fas fa-shopping-basket"></i></div>
                <a href="{{route('orders.index')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Doanh thu tháng -->
    <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ number_format($totalRevenueMonth) }}₫</h3>
                    <p>Doanh thu (30 ngày)</p>
                </div>
                <div class="icon"><i class="fas fa-coins"></i></div>
                <a href="{{route('orders.index')}}" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">

    <section class="col-lg-6 connectedSortable">
        <!-- Biểu đồ tuần -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thống kê đơn &amp; doanh thu trong tuần</h3>
            </div>
            <div class="card-body">
                <canvas id="weeklyChart" style="min-height: 250px; height: 350px;"></canvas>
            </div>
        </div>
    </section>

    <section class="col-lg-6 connectedSortable">
        <!-- Biểu đồ tháng -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thống kê đơn &amp; doanh thu trong tháng</h3>
            </div>
            <div class="card-body">
                <canvas id="monthlyChart" style="min-height: 250px; height: 350px;"></canvas>
            </div>
        </div>
    </section>


{{--    <section class="col-lg-12 connectedSortable">--}}
{{--        <!-- BAR CHART -->--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <h3 class="card-title">Biểu đồ doanh số đặt hàng 10 ngày gần nhất</h3>--}}

{{--                <div class="card-tools">--}}
{{--                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>--}}
{{--                    </button>--}}
{{--                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="chart">--}}
{{--                    <canvas id="barChart" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.card-body -->--}}
{{--        </div>--}}
{{--        <!-- /.card -->--}}
{{--    </section>--}}


{{--    <section class="col-lg-6 connectedSortable">--}}
{{--        <!-- TO DO List -->--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <h3 class="card-title">--}}
{{--                    <i class="ion ion-clipboard mr-1"></i>--}}
{{--                    Số lượt truy cập theo ngày--}}
{{--                </h3>--}}
{{--            </div>--}}
{{--            <!-- /.card-header -->--}}
{{--            <div class="card-body">--}}
{{--                <div id="area-chart"></div>--}}

{{--            </div>--}}
{{--            <!-- /.card-body -->--}}
{{--        </div>--}}
{{--        <!-- /.card -->--}}
{{--    </section>--}}

{{--    <section class="col-lg-6 connectedSortable">--}}
{{--        <!-- TO DO List -->--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <h3 class="card-title">--}}
{{--                    <i class="ion ion-clipboard mr-1"></i>--}}
{{--                    Nguồn truy cập (30 ngày gần nhất)--}}
{{--                </h3>--}}
{{--            </div>--}}
{{--            <!-- /.card-header -->--}}
{{--            <div class="card-body">--}}
{{--                <div id="organic-chart"></div>--}}

{{--            </div>--}}
{{--            <!-- /.card-body -->--}}
{{--        </div>--}}
{{--        <!-- /.card -->--}}
{{--    </section>--}}

</div>



<!-- /.row (main row) -->
@endsection
@section('script')
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ URL('plugins/countjs/count.js') }}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plugins/morrisjs/morris.js') }}"></script>
{{--<script>--}}
{{--var today = new Date();--}}
{{--    function minusDays(dateObj, numDays) {--}}
{{--        dateObj.setDate(dateObj.getDate() - numDays);--}}
{{--        return dateObj;--}}
{{--    }--}}
{{--    function formatDate(date) {--}}
{{--        var dd = String(date.getDate()).padStart(2, '0');--}}
{{--        var mm = String(date.getMonth() + 1).padStart(2, '0');--}}
{{--        var yyyy = date.getFullYear();--}}
{{--        today = dd + '/' + mm + '/' + yyyy;--}}
{{--        return today;--}}
{{--    }--}}
{{--    var weeks = [];--}}
{{--    for(i = 0; i < 10; i++) {--}}
{{--        let now = new Date();--}}
{{--        day = minusDays(now, i);--}}
{{--        today = formatDate(day);--}}
{{--        weeks[i] = today;--}}
{{--    }--}}
{{--    weeks = weeks.reverse();--}}
{{--    let sales = @json($sales);--}}

{{--    let sale_data = weeks.map(w => {--}}
{{--        let exist = sales.find(val => dateGetter(val.day) == w);--}}
{{--        if (exist) return exist.total_price;--}}
{{--        return 0;--}}
{{--    })--}}


{{--    var areaChartData = {--}}
{{--      labels  : weeks,--}}
{{--      datasets: [--}}
{{--        {--}}
{{--          label               : 'Doanh số ngày',--}}
{{--          backgroundColor     : 'rgb(38, 115, 215,0.9)',--}}
{{--          borderColor         : 'rgb(38, 115, 215,0.8)',--}}
{{--          pointRadius          : false,--}}
{{--          pointColor          : '#3b8bba',--}}
{{--          pointStrokeColor    : 'rgb(38, 115, 215,0.8)',--}}
{{--          pointHighlightFill  : '#fff',--}}
{{--          pointHighlightStroke: 'rgb(38, 115, 215,0.8)',--}}
{{--          data                : sale_data--}}
{{--        },--}}

{{--      ]--}}
{{--    }--}}
{{--    //- BAR CHART ---}}
{{--    //---------------}}
{{--    var barChartCanvas = $('#barChart').get(0).getContext('2d')--}}
{{--    var barChartData = jQuery.extend(true, {}, areaChartData)--}}
{{--    var temp0 = areaChartData.datasets[0]--}}
{{--    barChartData.datasets[0] = temp0--}}
{{--    var barChartOptions = {--}}
{{--      responsive              : true,--}}
{{--      maintainAspectRatio     : false,--}}
{{--      datasetFill             : false--}}
{{--    }--}}
{{--    var barChart = new Chart(barChartCanvas, {--}}
{{--      type: 'bar',--}}
{{--      data: barChartData,--}}
{{--      options: barChartOptions--}}
{{--    })--}}

{{--    Morris.Donut({--}}
{{--    element: 'devices-chart',--}}
{{--    data: [--}}
{{--        @if(@$data_analytics['devices'])--}}
{{--            @foreach ($data_analytics['devices'] as $item)--}}
{{--                { label: "{{ $item['device'] }}", value: {{ $item['count'] }} },--}}
{{--            @endforeach--}}
{{--        @endif--}}

{{--    ]--}}
{{--  });--}}

{{--  Morris.Bar({--}}
{{--    element: 'organic-chart',--}}
{{--    behaveLikeLine: true,--}}
{{--    data: [--}}
{{--        @if(@$data_analytics['organic_search'])--}}
{{--            @foreach ($data_analytics['organic_search'] as $key => $item)--}}
{{--        { source: '{{ $item['source'] }}', total: {{ $item['count'] }} },--}}
{{--        @if($key > 4)--}}
{{--        @break--}}
{{--        @endif--}}
{{--        @endforeach--}}
{{--        @endif--}}

{{--    ],--}}
{{--    xkey: 'source',--}}
{{--    ykeys: ['total'],--}}
{{--    labels: 'Số lượt',--}}
{{--    barRatio: 0.4,--}}
{{--    xLabelAngle: 35,--}}
{{--    barColors:['#1abc9c'],--}}
{{--    hideHover: 'auto'--}}
{{--  });--}}

{{--  Morris.Area({--}}
{{--    element: 'area-chart',--}}
{{--    behaveLikeLine: true,--}}
{{--    data: [--}}
{{--        @if(@$data_analytics['total_page_views'])--}}
{{--            @foreach ($data_analytics['total_page_views'] as $key=>$item)--}}
{{--            { day: '{{  \Carbon\Carbon::parse($item['date'])->format('d/m') }}', visitors: {{ $item['visitors'] }}, pageViews: {{ $item['pageViews'] }} },--}}
{{--            @endforeach--}}
{{--        @endif--}}

{{--    ],--}}
{{--    xkey: 'day',--}}
{{--    ykeys: ['visitors', 'pageViews'],--}}
{{--    labels: ['Lượt truy cập', 'Lượt xem trang'],--}}
{{--    parseTime: false,--}}
{{--    pointFillColors:['rgb(126, 129, 203)'],--}}
{{--    pointStrokeColors: ['rgb(126, 129, 203)'],--}}
{{--    lineColors:['#2ecc71','#1abc9c'],--}}
{{--    fillOpacity: 0.4--}}
{{--  });--}}
{{--</script>--}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const weeklyLabels = @json(
        $weekly->pluck('period')
               ->map(function($d) {
                   return \Carbon\Carbon::parse($d)->format('d/m');
               })
    );
        const weeklyOrderCounts = @json($weekly->pluck('order_count'));
        const weeklyRevenues   = @json($weekly->pluck('revenue'));

        const monthlyLabels = @json(
        $monthly->pluck('period')
                ->map(function($d) {
                    return \Carbon\Carbon::parse($d)->format('d/m');
                })
    );
        const monthlyOrderCounts = @json($monthly->pluck('order_count'));
        const monthlyRevenues   = @json($monthly->pluck('revenue'));

        // Hàm chung tạo chart
        function createBarChart(ctx, labels, orders, revenues) {
            return new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Số đơn',
                            data: orders,
                            yAxisID: 'y-orders',
                            backgroundColor: 'rgba(54, 162, 235, 0.6)'
                        },
                        {
                            label: 'Doanh thu',
                            data: revenues,
                            yAxisID: 'y-revenue',
                            backgroundColor: 'rgba(255, 206, 86, 0.6)'
                        }
                    ]
                },
                options: {
                    scales: {
                        'y-orders': {
                            type: 'linear',
                            position: 'left',
                            title: { display: true, text: 'Số đơn' }
                        },
                        'y-revenue': {
                            type: 'linear',
                            position: 'right',
                            title: { display: true, text: 'Doanh thu (₫)' },
                            grid: { drawOnChartArea: false }
                        }
                    },
                    responsive: true,
                    interaction: { mode: 'index', intersect: false },
                }
            });
        }

        // Khởi tạo chart khi DOM sẵn sàng
        document.addEventListener('DOMContentLoaded', () => {
            const ctxWeek = document.getElementById('weeklyChart').getContext('2d');
            const ctxMonth = document.getElementById('monthlyChart').getContext('2d');

            createBarChart(ctxWeek, weeklyLabels, weeklyOrderCounts, weeklyRevenues);
            createBarChart(ctxMonth, monthlyLabels, monthlyOrderCounts, monthlyRevenues);
        });

    </script>
@endsection

@extends('layouts.admin')
@section('title')
    {{ __(' Dashboard') }}
@endsection
@section('content')
    <!-- [ breadcrumb ] start -->

    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">{{ __('Selamat Datang di Dashboard') }}</h2>
        </div>
    </div> 
    <div class="row">
        <!-- analytic cards start -->
        <div class="col-xl-3 col-md-6">
            @can('manage-user')
            <div class="card comp-card text-center">
                <div class="card-body">
                    <h6 class="text-muted">{{ __('Total Users') }}</h6>
                    <h3>{{ $user }}</h3>
                    <a href="users" class="btn btn-primary">{{ __('View Users') }}</a>
                </div>
                <div class="card-footer bg-primary text-white">
                    <i class="ti ti-users"></i>
                </div>
            </div>
            @endcan
        </div>

        <div class="col-xl-3 col-md-6">
            @can('manage-role')
            <div class="card comp-card text-center">
                <div class="card-body">
                    <h6 class="text-muted">{{ __('Total Role') }}</h6>
                    <h3>{{ $role }}</h3>
                    <a href="roles" class="btn btn-info">{{ __('View Roles') }}</a>
                </div>
                <div class="card-footer bg-info text-white">
                    <i class="ti ti-key"></i>
                </div>
            </div>
            @endcan
        </div>

        <div class="col-xl-3 col-md-6">
            @can('manage-module')
            <div class="card comp-card text-center">
                <div class="card-body">
                    <h6 class="text-muted">{{ __('Total Module') }}</h6>
                    <h3>{{ $modual }}</h3>
                    <a href="modules" class="btn btn-success">{{ __('View Modules') }}</a>
                </div>
                <div class="card-footer bg-success text-white">
                    <i class="ti ti-book"></i>
                </div>
            </div>
            @endcan
        </div>

        <div class="col-xl-3 col-md-6">
            @can('manage-language')
            <div class="card comp-card text-center">
                <div class="card-body">
                    <h6 class="text-muted">{{ __('Total Languages') }}</h6>
                    <h3>{{ $languages }}</h3>
                    <a href="language" class="btn btn-danger">{{ __('View Languages') }}</a>
                </div>
                <div class="card-footer bg-danger text-white">
                    <i class="ti ti-world"></i>
                </div>
            </div>
            @endcan
        </div>

        <!-- Chart Section -->
        <div class="col-lg-12 mt-4">
            @role('admin')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ __('User Statistics') }}</h4>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="btn-group btn-group-toggle" role="group" aria-label="User Stats Toggle">
                                <input type="radio" class="btn-check" id="option1" name="options" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="option1">{{ __('Month') }}</label>

                                <input type="radio" class="btn-check" id="option2" name="options" autocomplete="off">
                                <label class="btn btn-outline-primary" for="option2">{{ __('Year') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="c-chart-wrapper">
                        <canvas class="chart" id="main-chart" height="300"></canvas>
                    </div>
                </div>
            </div>
            @endrole
        </div>
    </div>
    <!-- [ Main Content ] end -->
@endsection

@push('style')
    {{-- Custom CSS --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush

@section('javascript')
@role('admin')
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script>
        $(document).on("click", "#option2", function() {
            getChartData('year');
        });

        $(document).on("click", "#option1", function() {
            getChartData('month');
        });
        
        $(document).ready(function() {
            getChartData('month');
        });

        function getChartData(type) {
            $.ajax({
                url: "{{ route('get.chart.data') }}",
                type: 'POST',
                data: {
                    type: type,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    mainChart.data.labels = result.label;
                    mainChart.data.datasets[0].data = result.value;
                    mainChart.update();
                },
                error: function(data) {
                    console.log(data.responseJSON);
                }
            });
        }
    </script>
@endrole
@endsection

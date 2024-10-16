@extends('layouts.admin')

@section('title')
    {{ __('Dashboard') }}
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
        <!-- Analytic cards start -->
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

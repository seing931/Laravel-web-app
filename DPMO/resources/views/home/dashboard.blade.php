@extends('components.layout')

@section('content')

@endsection

@push('js')
    <script src="{{ Vite::asset('resources/js/plugins/chartjs.min.js') }}"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush

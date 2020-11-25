@extends('layouts.app')
@section('title page','Schedule Page')
@section('title tab','Schedule')


@section('css')
<!-- Styles -->
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
<!-- tailwindcss -->
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
<!-- Page CSS -->
@endsection

@section('content')
<!-- Main content -->
<section class="content" id="contentpage">
    <livewire:datatable model="App\\Models\Edc"/>

</section>
<!-- /.content -->
@endsection

@section('javascript')
<!-- jQuery UI -->
<script src="{{ asset('dashboard/plugins/jquery-ui/jquery-ui.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
@endsection

@push('scripts')
<script>
    $(".preloader").fadeOut("slow");

    //Date range picker
    $('#datepicker').datepicker({
            onSelect: function (dateText, inst) {
            $('#weekNumber').val($.datepicker.iso8601Week(new Date(dateText)));
            },
            showWeek: true,
            firstDay: 1,
            showOtherMonths: true,
            selectOtherMonths: true
        });

    //Initialize Select2 Elements
    $('.select2').select2()


</script>
@endpush

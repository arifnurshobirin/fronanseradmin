@extends('layouts.app')
@section('title page','Schedule Page')
@section('title tab','Schedule')


@push('css')
<!-- datepicker jquery -->
<link href="{{ asset('dashboard/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
<!-- datepicker jquery -->
<link href="{{ asset('dashboard/plugins/jquery-ui/jquery-ui.theme.min.css') }}" rel="stylesheet">
<!-- Select2 -->
<link href="{{ asset('dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!-- Page CSS -->
@endpush

@section('content')
<!-- Main content -->
<section class="content" id="contentpage">
    <livewire:schedule.index/>
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

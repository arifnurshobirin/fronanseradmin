@extends('layouts.app')
@section('title page','Monitoring Page')
@section('title tab','Monitoring Page')


@section('css')
<!-- Ekko Lightbox -->
<link href="{{ asset('dashboard/plugins/ekko-lightbox/ekko-lightbox.css') }}" rel="stylesheet">
<!-- Page CSS -->
@endsection

@section('content')
<!-- Main content -->
<section class="content" id="contentpage">
    <!-- Default box -->
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-desktop"></i> Monitoring</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div>
                <div class="btn-group w-100 mb-2">
                    <a class="btn btn-primary active" href="javascript:void(0)" data-filter="all">All POS</a>
                    <a class="btn btn-danger" href="javascript:void(0)" data-filter="1">POS Queueing</a>
                    <a class="btn btn-success" href="javascript:void(0)" data-filter="2">POS Active </a>
                    <a class="btn btn-warning" href="javascript:void(0)" data-filter="3">POS Inactive</a>
                    <a class="btn btn-secondary" href="javascript:void(0)" data-filter="4">POS Broken</a>
                </div>
                <div class="mb-2">
                    <a class="btn btn-default" href="javascript:void(0)" data-shuffle> Shuffle POS </a>
                    <div class="float-right">
                        <select class="custom-select" style="width: auto;" data-sortOrder>
                            <option value="index"> Sort by Position </option>
                            <option value="sortData"> Sort by Custom Data </option>
                        </select>
                        <div class="btn-group">
                            <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                            <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="filter-container">
                    @foreach($datacounter as $listcounter)
                        @if($listcounter->status == 'Queueing')
                    <div class="col-lg-2 col-sm-6 col-xs-6 filtr-item" data-category="1" data-sort="{{$listcounter->nocounter}}">
                        <!-- small card -->
                        <div id="changecolor" class="small-box bg-gradient-danger">
                        @elseif($listcounter->status == 'Active')
                    <div class="col-lg-2 col-sm-6 col-xs-6 filtr-item" data-category="2" data-sort="{{$listcounter->nocounter}}">
                        <!-- small card -->
                        <div id="changecolor{{$listcounter->Connection}}" class="small-box bg-gradient-success">
                        @elseif($listcounter->status == 'Inactive')
                    <div class="col-lg-2 col-sm-6 col-xs-6 filtr-item" data-category="3" data-sort="{{$listcounter->nocounter}}">
                        <!-- small card -->
                        <div id="changecolor" class="small-box bg-gradient-warning">
                        @elseif($listcounter->status == 'Broken')
                    <div class="col-lg-2 col-sm-6 col-xs-6 filtr-item" data-category="4" data-sort="{{$listcounter->nocounter}}">
                        <!-- small card -->
                        <div id="changecolor" class="small-box bg-gradient-secondary">
                        @endif

                            <div class="inner">
                                <h3>{{ $listcounter->nocounter }}</h3>
                                <p>{{ $listcounter->type }}</p>
                            </div>
                            <div class="icon">
                                @if($listcounter->status == 'Queueing')
                                <i class="fas fa-user"></i>
                                @elseif($listcounter->status == 'Active')
                                <i class="fas fa-user"></i>
                                @elseif($listcounter->status == 'Inactive')
                                <i class="fas fa-cash-register"></i>
                                @elseif($listcounter->status == 'Broken')
                                <i class="fas fa-cash-register"></i>
                                @endif
                            </div>
                            {{-- <a href={{ url('admin/monitoring/'.$listcounter->id) }} class="btn btn-block bg-dark" >EDC <i class="fas fa-fax"></i>
                            </a> --}}
                            {{-- <button type="button" class="btn btn-block bg-dark" data-toggle="modal" data-target="#edcmodal{{$listcounter->nocounter}}">
                                EDC <i class="fas fa-fax"></i>
                            </button> --}}
                            <a type="button" class="btn btn-block bg-dark edcshow" id="{{$listcounter->id}}" name="{{$listcounter->nocounter}}">
                                EDC <i class="fas fa-fax"></i>
                            </a>
                        </div>

                    </div>

                    @endforeach

                    <!-- EDC Modal -->
                    <div class="modal fade" id="edcmodal" data-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="headingmodal">Detail EDC POS</h4>
                                    <button type="button" class="btn btn-danger" id="resetmodal" data-dismiss="modal"><i class='fas fa-times'></i> Close</button>
                                </div>
                                <div class="modal-body" id="createedc">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# EDC Modal -->
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <ul id="list" class="list-group"></ul>
            Project Website Cashier Carrefour Taman Palem
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

@endsection

@section('javascript')
<!-- Ekko Lightbox -->
<script src="{{ asset('dashboard/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<!-- Filterizr-->
<script src="{{ asset('dashboard/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
<!-- page script -->
<script>
    $(".preloader").fadeOut("slow");

    $(document).ready(function() {
        $('.filter-container').filterizr({
            gutterPixels: 3
        });

        $('.btn[data-filter]').on('click', function () {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });

        $(document).on('click', '.edcshow', function () {
            $('.edcshow').addClass('disabled');
            var id = $(this).attr('id');
            var nocounter = $(this).attr('name');
            judul = "Detail EDC POS ".concat(nocounter);
            $('#headingmodal').html(judul);
            $.get("{{ route('monitoring.index') }}" +'/' + id, function (dataedc)
            {
                var objectedc= dataedc;
                var linkimage="{{ asset('dashboard/img/')}}"
                //console.log(objectedc);
                objectedc.forEach(function(ambilData, data){
                    $('#edcmodal').modal('show');
                    $('#createedc').append("<div class='card bg-light'>"+
                                                "<div class='card-header text-muted border-bottom-0'>Electronic Data Capture</div>"+
                                                "<div class='card-body pt-0'>"+
                                                    "<div class='row'>"+
                                                        "<div class='col-7'>"+
                                                            "<h2 class='lead'><b id='headedc'>EDC "+ambilData.type+"</b></h2>"+
                                                            "<p class='text-muted text-sm'><b id='tidedc'>TID: "+ambilData.tidedc+"</b> </p>"+
                                                            "<ul class='ml-4 mb-0 fa-ul text-muted' id='createedc'>"+
                                                                "<li class='small' id='statusedc'>"+
                                                                    "<span class='fa-li'><i class='fas fa-lg fa-fax'></i></span>"+
                                                                    "Status: <span class='badge badge-primary'>"+ambilData.status+"</span>"+
                                                                "</li>"+
                                                                "<li class='small' id='connectionedc'>"+
                                                                    "<span class='fa-li'><i class='fas fa-lg fa-sim-card'></i></span>Connection: "+ambilData.connection+
                                                                "</li>"+
                                                            "</ul>"+
                                                        "</div>"+
                                                        "<div class='col-5 text-center'><img src="+
                                                        linkimage+"/"+ambilData.type+".jpg"+
                                                        " alt='' class='img-circle img-fluid'></div>"+
                                                    "</div>"+
                                                "</div>"+
                                                "<div class='card-footer'>"+
                                                    "<div class='text-right'><a href="+
                                                    "{{ route('edc.index') }}"+
                                                    " class='btn btn-sm bg-secondary'>"+
                                                        "<i class='fas fa-cogs'></i></a>"+
                                                        "   <a href="+"{{ route('edc.index') }}/7"+" class='edcprofile btn btn-sm btn-secondary' id='7'>"+
                                                        "<i class='fas fa-user'></i> View Profile</a>"+
                                                    "</div>"+
                                                "</div>"+
                                            "</div>");
                })
            })
        });

        $(document).on('click', '#resetmodal', function () {
            $('.edcshow').removeClass('disabled');
            $('#createedc').html("");
        });
    });
</script>
@endsection

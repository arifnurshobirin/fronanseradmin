@extends('layouts.app')
@section('title page','Shift Page')
@section('title tab','Shift')


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
    <!-- Default box -->
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-calendar-check"></i> Shift DataTable</h3>
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
            <!--  table codeshift -->
            <div class="table-responsive">
                <table
                    class="display responsive table table-striped table-hover dataTable js-exportable"
                    id="CodeShiftDatatable" style="width:100%">
                    <thead class="bg-danger">
                        <tr>
                            <th><button type="button" name="schedulemoredelete" id="schedulemoredelete"
                                class="btn btn-danger btn-sm">
                                <i class="fas fa-times"></i><span></span>
                                </button>
                            </th>
                            <th></th>
                            <th>Code Shift</th>
                            <th>Start Shift</th>
                            <th>End Shift</th>
                            <th>Working Hour</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- <tbody>
                    @foreach($dataworkinghour as $list)
                    <tr>

                    </tr>
                    @endforeach
                    </tbody> -->
                    <tfoot class="bg-danger">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Code Shift</th>
                            <th>Start Shift</th>
                            <th>End Shift</th>
                            <th>Working Hour</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- #END# table codeshift -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Project Website Cashier Carrefour Taman Palem
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection

@section('javascript')
<!-- jQuery UI -->
<script src="{{ asset('dashboard/plugins/jquery-ui/jquery-ui.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- date-range-picker -->
{{-- <script src="{{ asset('dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script> --}}
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="{{ asset('dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
<!-- datepicker -->
{{-- <script src="{{ asset('dashboard/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script> --}}
<!-- page script -->
<script>
    $(".preloader").fadeOut("slow");
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Working Date : </td>'+
            '<td>'+d.id+'</td>'+
            '<td>'+d.id+'</td>'+
            '<td>'+d.id+'</td>'+
            '<td>'+d.id+'</td>'+
            '<td>'+d.id+'</td>'+
            '<td>'+d.id+'</td>'+
            '<td>'+d.id+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Working Shift : </td>'+
            '<td>'+'A7'+'</td>'+
            '<td>'+'A7'+'</td>'+
            '<td>'+'A7'+'</td>'+
            '<td>'+'OFF'+'</td>'+
            '<td>'+'A7'+'</td>'+
            '<td>'+'A7'+'</td>'+
            '<td>'+'A7'+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Working Hour :</td>'+
            '<td id=childhourmon'+d.id+'></td>'+
            '<td id=childhour'+d.id+'> Hour</td>'+
        '</tr>'+
    '</table>';
}

$(document).ready(function() {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    var tablecodeshift = $('#CodeShiftDatatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: { url:"{{ route('shift.datatable') }}",},
    responsive: true,
    columns: [
        { data: 'checkbox', name: 'checkbox', orderable:false, searchable: false},
        {
        "className":      'details-control',
        "orderable":      false,
        "searchable":     false,
        "data":           null,
        "defaultContent": ''
        },
        { data: 'codeshift', name: 'codeshift' },
        { data: 'startshift', name: 'startshift'},
        { data: 'endshift', name: 'endshift'},
        { data: 'workinghour', name: 'workinghour'},
        { data: 'action', name: 'action', orderable: false,searchable: false}
        ],
    order: [[ 2, "asc" ]],
    dom: 'Bfrtip',
    lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
    ],
    buttons:['pageLength',
        {
            extend: 'collection',
            text: 'Export',
            className: 'btn btn-info',
            buttons:[ 'copy', 'csv', 'excel', 'pdf', 'print',
                        {
                            collectionTitle: 'Visibility control',
                            extend: 'colvis',
                            collectionLayout: 'two-column'
                        }
                    ]
        },
        {
            text: '<i class="fas fa-user-clock"></i><span> Code Shift</span>',
            className: 'btn btn-success',
            action: function ( e, dt, node, config ) {
                $('#schedulesave').val("create-schedule");
                $('#schedulesave').html('Save');
                $('#scheduleid').val('');
                $('#scheduleform').trigger("reset");
                $('#modelHeading').html("Create New Schedule");
                $('#codeshiftmodal').modal('show');
            }
        }
    ]
    });

     // Add event listener for opening and closing details
    $('#CodeShiftDatatable').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        });


});
</script>
@endsection

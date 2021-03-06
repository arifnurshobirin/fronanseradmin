@extends('layouts.app')
@section('title page','Computer Page')
@section('title tab','Computer')


@section('css')
<!-- Page CSS -->
@endsection

@section('content')
<!-- Main content -->
<section class="content" id="contentpage">
    <!-- Default box -->
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-hdd"></i> Computer DataTable</h3>
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
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="ComputerDatatable" style="width:100%">
                    <thead class="bg-danger">
                        <tr>
                            <th><button type="button" name="computermoredelete" id="computermoredelete" class="btn btn-danger btn-sm">
                                    <i class="fas fa-times"></i><span></span>
                                </button></th>
                            <th></th>
                            <th>No Computer</th>
                            <th>Type</th>
                            <th>Printer</th>
                            <th>Drawer</th>
                            <th>Scanner</th>
                            <th>Monitor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-danger">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>No Computer</th>
                            <th>Type</th>
                            <th>Printer</th>
                            <th>Drawer</th>
                            <th>Scanner</th>
                            <th>Monitor</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Create Table -->
            <div class="modal fade" id="ajaxModel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modelHeading"></h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="computerform" name="computerform">
                                @csrf
                                <input type="hidden" name="computerid" id="computerid">
                                <label for="nocomputer">No Computer</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nocomputer" name="nocomputer" class="form-control"
                                            placeholder="Enter your No Computer" required>
                                    </div>
                                </div>
                                <label for="cpu">CPU Computer</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="cpu" name="cpu">
                                            <option value="">-- Please select --</option>
                                            <option value="Zonerich">Zonerich</option>
                                            <option value="IBM">IBM</option>
                                            <option value="HP">HP</option>
                                            <option value="Wincore M2">Wincore M2</option>
                                            <option value="Wincore M3">Wincore M3</option>
                                        </select>
                                    </div>
                                </div>

                                <label for="printer">Printer</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="printer" name="printer">
                                            <option value="">-- Please select --</option>
                                            <option value="ND 77">ND 77</option>
                                            <option value="Star">Star</option>
                                            <option value="Zonerich">Zonerich</option>
                                            <option value="Wincore Nixdrof">Wincore Nixdrof</option>
                                            <option value="Epson">Epson</option>
                                            <option value="HP">HP</option>
                                        </select>
                                    </div>
                                </div>

                                <label for="scanner">Scanner</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="scanner" name="scanner">
                                            <option value="">-- Please select --</option>
                                            <option value="Magellan 8100">Magellan 8100</option>
                                            <option value="Magellan 2000">Magellan 2000</option>
                                            <option value="Datalogic">Datalogic</option>
                                            <option value="Zonerich">Zonerich</option>
                                            <option value="HP">HP</option>
                                        </select>
                                    </div>
                                </div>

                                <label for="drawer">Drawer</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="drawer" name="drawer">
                                            <option value="">-- Please select --</option>
                                            <option value="Wincore">Wincore</option>
                                            <option value="IBM">IBM</option>
                                            <option value="HP">HP</option>
                                        </select>
                                    </div>
                                </div>

                                <label for="monitor">Monitor</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="monitor" name="monitor">
                                            <option value="">-- Please select --</option>
                                            <option value="TFT">TFT</option>
                                            <option value="HP">HP</option>
                                            <option value="Wincore">Wincore</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="computersave"
                                    value="create">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Create Table -->
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
<!-- page script -->
<script>
    $(".preloader").fadeOut("slow");
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>Full name:</td>'+
                '<td>'+d.Printer+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extension number:</td>'+
                '<td>'+d.Printer+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extra info:</td>'+
                '<td>And any further details here (images etc)...</td>'+
            '</tr>'+
        '</table>';
    }
    $(document).ready(function() {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        // var template = Handlebars.compile($("#details-template").html());
        var table = $('#ComputerDatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: { url:"{{ route('computer.datatable') }}",},
        "order": [[ 2, "asc" ]],
        columns: [
            { data: 'checkbox', name: 'checkbox', orderable:false, searchable: false},
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable":     false,
                "data":           null,
                "defaultContent": ''
            },
            { data: 'nocomputer', name: 'nocomputer' },
            { data: 'type', name: 'type' },
            { data: 'printer', name: 'printer' },
            { data: 'drawer', name: 'drawer' },
            { data: 'scanner', name: 'scanner' },
            { data: 'monitor', name: 'monitor' },
            { data: 'action', name: 'action', orderable: false,searchable: false}
            ],
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
                        text: '<i class="fas fa-plus"></i><span> Add Computer</span>',
                        className: 'btn btn-success',
                        action: function ( e, dt, node, config ) {
                            $('#computersave').val("create Computer");
                            $('#computersave').html('Save');
                            $('#computerid').val('');
                            $('#computerform').trigger("reset");
                            $('#modelHeading').html("Create New Computer");
                            $('#ajaxModel').modal('show');
                        }
                    }
                ]

        });

        // Add event listener for opening and closing details
        $('#ComputerDatatable').on('click', 'td.details-control', function () {
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

        $(document).on('click', '.computershow', function () {
            var id = $(this).attr('id');
                $('#contentpage').load('computer'+'/'+id);
        });


        $('#computerform').on("submit",function (event) {
            event.preventDefault();
            $('#computersave').html('Sending..');
            var formdata = new FormData($(this)[0]);
            $.ajax({
                url: "{{ route('computer.store') }}",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success: function (data) {

                    $('#computerform').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    $('#computersave').html('Save');
                    table.draw();
                    swal.fire("Good job!", "You success update Computer!", "success");
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#computersave').html('Save Changes');
                    alert('Status: ' + data);
                }
            });
        });

        $(document).on('click', '.computeredit', function () {
            var computerid = $(this).attr('id');
            $.get("{{ route('computer.index') }}" +'/' + computerid +'/edit', function (data)
            {
                $('#modelHeading').html("Edit Data Computer");
                $('#computersave').val("edit-computer");
                $('#computersave').html('Save Changes');
                $('#ajaxModel').modal('show');
                $('#computerid').val(data.id);
                $('#nocomputer').val(data.NoComputer);
                $('#cpu').val(data.CPU);
                $('#printer').val(data.Printer);
                $('#drawer').val(data.Drawer);
                $('#scanner').val(data.Scanner);
                $('#monitor').val(data.Monitor);
            })
        });

            var computerid;
            $(document).on('click', '.computerdelete', function(){
            computerid = $(this).attr('id');
            swal.fire({
                title: "Are you sure?",
                text: "You will not be able to recover this Computer file!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel!"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                url:"computer/"+computerid,
                type: "DELETE",
                success:function(data){
                    swal.fire("Deleted!", "Your Computer file has been deleted.", "success")
                    $('#ComputerDatatable').DataTable().ajax.reload();
                }
                });
                } else {
                    swal.fire("Cancelled", "Your Computer file is safe :)", "error");
                }
            });
        });

        $(document).on('click', '#computermoredelete', function(){
            var id = [];
            swal.fire({
                title: "Are you sure?",
                text: "You will not be able to recover this Computer file!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel!"
            }).then((result) => {
                if (result.value) {
                    $('.computercheckbox:checked').each(function(){
                        id.push($(this).val());
                    });
                    if(id.length > 0)
                    {
                        $.ajax({
                        url:"{{ route('computer.moredelete')}}",
                        method:"get",
                        data:{id:id},
                        success:function(data){
                        swal.fire("Deleted!", "Your Computer file has been deleted.", "success")
                        $('#ComputerDatatable').DataTable().ajax.reload();
                            }
                        });
                    }
                    else
                    {swal.fire("Please select atleast one checkbox");}
                }
                else
                {swal.fire("Cancelled", "Your POS file is safe :)", "error");}
                });
            });

    });

</script>
@endsection

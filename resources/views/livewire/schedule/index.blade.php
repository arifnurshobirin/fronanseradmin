<div>
    <!-- Default box -->
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-calendar-check"></i> Schedule DataTable</h3>
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
            <!-- Date range -->
            <form method="post" id="scheduleform" name="scheduleform">
                @csrf
                <div class="form-group">
                    <label>Filter :</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="datepicker" placeholder="Select a date">
                            <input type="text" class="form-control" id="weekNumber" placeholder="Week Number">
                        </div>
                        <div class="col-md-3">
                            <div class="select2-danger">
                                <select data-column="3" class="form-control select2" multiple="multiple" data-placeholder="Select a Position" style="width: 100%;"
                                data-dropdown-css-class="select2-danger" id="selectposition" name="selectposition">
                                    <option value="Cashier">Cashier</option>
                                    <option value="Customer Service">Customer Service</option>
                                    <option value="TDR">TDR</option>
                                    <option value="Senior Cashier">Senior Cashier</option>
                                    <option value="Cashier Head">Cashier Head</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="select2-danger">
                                <select data-column="5" class="form-control select2" multiple="multiple" data-placeholder="Select a Status" style="width: 100%;"
                                data-dropdown-css-class="select2-danger" id="selectstatus" name="selectstatus">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label>Filter :</label>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" name="scheduleapply" id="scheduleapply"
                                class="btn btn-primary">Apply</button>
                            <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                            <button type="submit" name="saveallschedule" id="saveallschedule" class="btn btn-success"
                                value="create">
                                Save Schedule
                            </button>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="button" class="btn  btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.form group -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover"
                    id="ScheduleDatatable" style="width:100%">
                    <thead>
                        <tr class="table-danger">
                            <th><button type="button" name="schedulemoredelete" id="schedulemoredelete"
                                    class="btn btn-danger btn-sm">
                                    <i class="fas fa-times"></i><span></span>
                                </button></th>
                            <th></th>
                            <th wire:click="sortBy('Employee')" style="cursor: pointer;">Employee Name @include('components.sorticon',['field'=>'Employee'])</th>
                            <th wire:click="sortBy('Position')" style="cursor: pointer;">Position @include('components.sorticon',['field'=>'Position'])</th>
                            <th wire:click="sortBy('Id')" style="cursor: pointer;">Week Number @include('components.sorticon',['field'=>'Id'])</th>
                            <th wire:click="sortBy('Status')" style="cursor: pointer;">Status @include('components.sorticon',['field'=>'Status'])</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datacashier as $listcashier)
                        <tr>
                            <td><input type="checkbox" name="check" class="" value="{{$listcashier->id}}"></td>
                            <td></td>
                            <td>{{ $listcashier->Employee }} {{ $listcashier->FullName }}</td>
                            <td>{{ $listcashier->Position }}</td>
                            <td>Week {{ $listcashier->id }}</td>
                            <td>{{ $listcashier->Status }}</td>
                            <td><div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="schedulecreate dropdown-item" id="{{$listcashier->id}}"><i class="fas fa-desktop"></i> Create</a>
                                        <a class="scheduleedit dropdown-item" id="{{$listcashier->id}}" onclick="editschedule({{$listcashier->id}})"><i class="fas fa-edit"></i> Edit</a>
                                        <a class="scheduledelete dropdown-item" id="{{$listcashier->id}}"><i class="fas fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </td>

                        </tr>

                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Employee Name</th>
                            <th>Position</th>
                            <th>Week Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="col form-inline">
                        <select wire:model="perPage" class="form-control rounded">
                            <option value="10">10 rows</option>
                            <option value="25">25 rows</option>
                            <option value="50">50 rows</option>
                            <option value="500">Show all</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    {{ $datacashier->links() }}
                </div>
                <div class="col-md-3">
                    Showing {{ $datacashier->firstItem() }} to{{ $datacashier->lastItem() }} of {{ $datacashier->total() }} entries
                </div>
            </div>
        </div>


            <!-- Create Table -->
            <div class="modal fade" id="schedulemodal" data-backdrop="static" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modelHeading">Create Schedule</h4>
                            <button type="button" class="btn btn-secondary" id="resetmodal" data-dismiss="modal"><i class='fas fa-times'></i> Close</button>
                        </div>
                        <div class="modal-body" id="schedulemodalbody">
                            <!-- Profile Image -->
                            <div class="card card-danger card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('img/userarif160x160.jpg') }}"
                                            alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center">Arif Nur Shobirin</h3>
                                    <p class="text-muted text-center">Senior Cashier</p>
                                    <form method="post" id="scheduleform" name="scheduleform">
                                        @csrf
                                    <div class="form-group row">
                                        <select class="custom-select col-sm-3" id="selectshift" name="selectshift">
                                            {{-- @foreach($dataworkinghour as $list)
                                            <option value="{{$list->id}}">Week {{$list->id}}</option>
                                            @endforeach --}}
                                        </select>
                                        <label class="col-form-label col-sm-3" id="labeltotalwh" name="labeltotalwh">0 Hour</label>
                                        <button type="submit" class="btn btn-primary col-sm-3" id="schedulesave" value="create">Save</button>
                                    </div>
                                    <input type="hidden" name="scheduleid" id="scheduleid">
                                    <div class="form-group row">
                                        <label for="labeldate" class="col-sm-3 col-form-label">Senin :</label>
                                        <div class="form-line col-sm-2">
                                            <input type="text" class="form-control input-uppercase" id="codeshift1" name="codeshift1" oninput="datashift(1)">
                                        </div>
                                        <div class="form-line col-sm-5">
                                        <input type="text" class="form-control" id="inputshift1" name="inputshift1" readonly>
                                        </div>
                                        <div class="form-line col-sm-2">
                                            <label class="col-form-label" id="labelhour1" name="labelhour">0</label>
                                            Hour
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="labeldate" class="col-sm-3 col-form-label">Selasa :</label>
                                        <div class="form-line col-sm-2">
                                            <input type="text" class="form-control input-uppercase" id="codeshift2" name="codeshift2" oninput="datashift(2)">
                                        </div>
                                        <div class="form-line col-sm-5">
                                        <input type="text" class="form-control" id="inputshift2" name="inputshif2t" readonly>
                                        </div>
                                        <div class="form-line col-sm-2">
                                            <label class="col-form-label" id="labelhour2" name="labelhour">0</label>
                                            Hour
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="labeldate" class="col-sm-3 col-form-label">Rabu :</label>
                                        <div class="form-line col-sm-2">
                                            <input type="text" class="form-control input-uppercase" id="codeshift3" name="codeshift3" oninput="datashift(3)">
                                        </div>
                                        <div class="form-line col-sm-5">
                                        <input type="text" class="form-control" id="inputshift3" name="inputshift3" readonly>
                                        </div>
                                        <div class="form-line col-sm-2">
                                            <label class="col-form-label" id="labelhour3" name="labelhour">0</label>
                                            Hour
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="labeldate" class="col-sm-3 col-form-label">Kamis :</label>
                                        <div class="form-line col-sm-2">
                                            <input type="text" class="form-control input-uppercase" id="codeshift4" name="codeshift4" oninput="datashift(4)">
                                        </div>
                                        <div class="form-line col-sm-5">
                                        <input type="text" class="form-control" id="inputshift4" name="inputshift4" readonly>
                                        </div>
                                        <div class="form-line col-sm-2">
                                            <label class="col-form-label" id="labelhour4" name="labelhour">0</label>
                                            Hour
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="labeldate" class="col-sm-3 col-form-label">Jumat :</label>
                                        <div class="form-line col-sm-2">
                                            <input type="text" class="form-control input-uppercase" id="codeshift5" name="codeshift5" oninput="datashift(5)">
                                        </div>
                                        <div class="form-line col-sm-5">
                                        <input type="text" class="form-control" id="inputshift5" name="inputshift5" readonly>
                                        </div>
                                        <div class="form-line col-sm-2">
                                            <label class="col-form-label" id="labelhour5" name="labelhour">0</label>
                                            Hour
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="labeldate" class="col-sm-3 col-form-label">Sabtu :</label>
                                        <div class="form-line col-sm-2">
                                            <input type="text" class="form-control input-uppercase" id="codeshift6" name="codeshift6" oninput="datashift(6)">
                                        </div>
                                        <div class="form-line col-sm-5">
                                        <input type="text" class="form-control" id="inputshift6" name="inputshift6" readonly>
                                        </div>
                                        <div class="form-line col-sm-2">
                                            <label class="col-form-label" id="labelhour6" name="labelhour">0</label>
                                            Hour
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="labeldate" class="col-sm-3 col-form-label">Minggu :</label>
                                        <div class="form-line col-sm-2">
                                            <input type="text" class="form-control input-uppercase" id="codeshift7" name="codeshift7" oninput="datashift(7)">
                                        </div>
                                        <div class="form-line col-sm-5">
                                        <input type="text" class="form-control" id="inputshift7" name="inputshift7" readonly>
                                        </div>
                                        <div class="form-line col-sm-2">
                                            <label class="col-form-label" id="labelhour7" name="labelhour">0</label>
                                            Hour
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Create Table -->

            <!-- modal codeshift -->
            <div class="modal fade" id="modalcodeshift" data-backdrop="static" aria-hidden="true">
                <div class="modal-dialog">
                    <!-- modal-lg -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalheadingcodeshift"></h4>
                        </div>
                        <div class="modal-body">
                            <button type="button" name="createcodeshift" id="createcodeshift"
                                onclick="fnClickAddRow()" class="btn btn-success">Create Code Shift</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <br>
                            <div class="table-responsive">
                                <table
                                    class="display responsive table table-striped table-hover dataTable js-exportable"
                                    id="CodeShiftDatatable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Code Shift</th>
                                            <th>Start Shift</th>
                                            <th>End Shift</th>
                                            <th>Working Hour</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- <tbody>
                        {{-- @foreach($dataworkinghour as $list)
                        <tr>

                        </tr>
                        @endforeach --}}
                    </tbody> -->
                                    <tfoot>
                                        <tr>
                                            <th>Code Shift</th>
                                            <th>Start Shift</th>
                                            <th>End Shift</th>
                                            <th>Working Hour</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# modal codeshift -->

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Project Website Cashier Carrefour Taman Palem
        </div>
    </div>
    <!-- /.card -->
</div>

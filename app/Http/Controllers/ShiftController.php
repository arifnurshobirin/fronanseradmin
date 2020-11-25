<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use DataTables;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // $datacashier = Cashier::all();
        $dataworkinghour = Shift::all();
        return view('schedule.codeshift',compact('dataworkinghour'));
        //return view('schedule.datatable');
    }


    public function datatable(Request $request)
    {
        $data = Shift::latest()->get();
            return DataTables::of($data)
            ->addColumn('checkbox', '<input type="checkbox" name="countercheckbox[]" class="checkbox countercheckbox" value="{{$id}}" />')
            ->addColumn('codeshift', '<input type="text" name="code{{$id}}" id="code{{$id}}" class="form-control" value="{{$codeshift}}" readonly/>')
            ->addColumn('startshift', '<input type="text" name="start{{$id}}" id="start{{$id}}" class="form-control" value="{{$startshift}}" readonly/>')
            ->addColumn('endshift', '<input type="text" name="end{{$id}}" id="end{{$id}}" class="form-control" value="{{$endshift}}" readonly/>')
            ->addColumn('workinghour', '<div class="input-group">
            <input type="text" name="hour{{$id}}" id="hour{{$id}}" class="form-control" value="{{$workinghour}}" readonly/>
            <div class="input-group-prepend"><span class="input-group-text">Hour</span> </div>
        </div>')
            ->addColumn('action',
                '<div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i> </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                <a class="schedulesave dropdown-item" id="{{$id}}" onclick="freezeschedule({{$id}})"><i class="fas fa-desktop"></i> Save</a>
                <a class="scheduleedit dropdown-item" id="{{$id}}" onclick="editschedule({{$id}})"><i class="fas fa-edit"></i> Edit</a>
                <a class="scheduledelete dropdown-item" id="{{$id}}"><i class="fas fa-trash"></i> Delete</a>
                </div></div>')
            ->rawColumns(['checkbox','codeshift','startshift','endshift','workinghour','action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        //
    }
}

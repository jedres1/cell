<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignmentCellphoneEmployee;
use App\Cellphone;
use App\Employee;
class AssignmentCellphoneEmployeeController extends Controller
{
    public function index()
    {
        $assignments=AssignmentCellphoneEmployee::orderBy('id','desc')
            ->with(['cellphone','employee'])
            ->paginate(10);
        //return $assignments;
        return view('assignments.index',['assignments'=>$assignments]);
    }
    public function create()
    {   
        $cellphones=Cellphone::where('status',1)->get();
        $employees=Employee::all();
        return view('assignments.create',compact('cellphones','employees'));
    }
    public function store(Request $request)
    {

        AssignmentCellphoneEmployee::create([
            'cellphone_id' => $request->cellphone_id,
            'employee_id' => $request->employee_id,
            'status' => $request->status
        ]);
        return redirect("/assignments");
    }
}

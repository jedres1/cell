<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignmentCellphoneEmployee;

class AssignmentCellphoneEmployeeController extends Controller
{
    public function index()
    {
        $assignments=AssignmentCellphoneEmployee::with(['cellphone','employee'])->get();//orderBy('id','desc')
            //->with(['cellphone','employee'])
            //->get();
        //return $assignments;
        return view('assignments.index',['assignments'=>$assignments]);
    }
    public function create()
    {
        return view('assignments.create');
    }
    public function store(Request $request)
    {

        AssignmentCellphoneEmployee::create([
            'cellphone_id' => $request->company_id,
            'employee_id' => $request->employee_id,
            'status' => $request->status
        ]);
        return redirect("/assignments");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('id','desc')
            ->with(['department','company'])
            ->get();
            
        return view('employees.index',[
            'employees' => $employees
        ]);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store( Request $request)
    {
        $this->validate($request,[
            'employee_name' =>'required',
            'company_id' =>'required',
            'department_id' =>'required'
            
        ]);
        Employee::create([
            'employee_name' => $request->employee_name,
            'company_id' => $request->company_id,
            'department_id' => $request->department_id,
            
        ]);
        return redirect('/employees'); 
    }
}

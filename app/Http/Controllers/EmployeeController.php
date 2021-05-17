<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;
use App\Department;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('id','asc')
            ->with(['department','company'])
            ->paginate(10);
            
        return view('employees.index',[
            'employees' => $employees
        ]);
    }

    public function create()
    {
        $employee = new Employee();
        $companies = Company::all();
        $departments = Department::all();
        return view('employees.create',compact('companies','departments','employee'));
    }

    public function store( Request $request)
    {
        $this->validate($request,[
            'employee_name' =>'required',
            'company_id' =>'required',
            'department_id' =>'required',
            'job_title'=>'required',
            'email'=>'required'
        ]);
        Employee::create([
            'employee_name' => $request->employee_name,
            'company_id' => $request->company_id,
            'department_id' => $request->department_id,
            'job_title' => $request->job_title,
            'email' => $request->email
            
        ]);
        return redirect('/employees'); 
    }
    public function show(Employee $employee)
    {
        return view('employees.show',compact('employee'));
    }
    public function edit($id)
    {   
        $employee=Employee::find($id);
        $companies=Company::all();
        $departments=Department::all();
        return view('employees.edit',compact('employee','companies','departments'));
    }
    public function update(Employee $employee)
    {
        $employee->update([
            'employee_name' => request('employee_name'),
            'company_id' => request('company_id'),
            'department_id' => request('department_id'),
            'job_title' => request('job_title'),
            'email' => request('email')
        ]);
        return redirect()->route('employees.show',$employee);
    }
}

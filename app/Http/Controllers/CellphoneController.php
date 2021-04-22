<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cellphone;

class CellphoneController extends Controller
{
    public function index()
    {
        return view('cellphones.index');
    }

    public function create()
    {
        return view('cellphones.create');
    }

    public function store( Request $request)
    {
        $this->validate($request,[
            'imei' =>'required',
            'brand' =>'required',
            'model' =>'required',
            'number' => 'required',
            'department' => 'required',
            'company' => 'required'
        ]);
        $request->auth()->comapies()->departments()->employees()->create([
            'imei' => $request->imei,
            'marca' => $request->brand,
            'model' => $request->model,
            'number' => $request->number,
            'department_id' => $request->department,
            'company_id' => $request->company,
            'employee_id' => $request->employee
        ]);
        return redirect('/cellphones'); 
    }
}

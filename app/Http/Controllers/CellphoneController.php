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

    public function create(Cellphone $cellphones)
    {
        $cellphones::find();
        return view('cellphones.create',content('cellphones'));
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
        Cellphone::create([
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

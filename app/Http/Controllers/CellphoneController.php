<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cellphone;

class CellphoneController extends Controller
{
    public function index()
    {
        $cellphones = Cellphone::orderBy('id','desc')
            ->with(['department','company'])
            ->get();
            
        return view('cellphones.index',[
            'cellphones' => $cellphones
        ]);
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
            'department_id' => 'required',
            'company_id' => 'required'
        ]);
        
        Cellphone::create([
            'imei' => $request->imei,
            'brand' => $request->brand,
            'model' => $request->model,
            'number' => $request->number,
            'department_id' => $request->department_id,
            'company_id' => $request->company_id
        ]);
        return redirect('/cellphones'); 
    }
}

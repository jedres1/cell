<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use App\Cellphone;
use App\Company;
use App\Department; 
use App\Number;
use App\AssignmentCellphoneEmployee;

class CellphoneController extends Controller
{
    public function index()
    {
        $cellphones = Cellphone::orderBy('id','desc')
            ->with(['department','company','number'])
            ->paginate(10);
        
        return view('cellphones.index',[
            'cellphones' => $cellphones
        ]);
    }

    public function create()
    {
        $companies=Company::all();
        $departments=Department::all();
        $numbers=Number::where('status','<>',1)->get();
        return view('cellphones.create',compact('companies','departments','numbers'));
    }

    public function store( Request $request)
    {
        $this->validate($request,[
            'imei' =>'required',
            'brand' =>'required',
            'model' =>'required',
            'number_id' => 'required',
            //status
            'department_id' => 'required',
            'company_id' => 'required'
        ]);
        
        Cellphone::create([
            'imei' => $request->imei,
            'brand' => $request->brand,
            'model' => $request->model,
            'number_id' => $request->number,
            'status' => 0,
            'department_id' => $request->department_id,
            'company_id' => $request->company_id
        ]);
        
        $number=Number::find($request->number);
        $number->update(['status'=>1]);

        return redirect('/cellphones'); 
    }
    public function update($id)
    {
        /*$cell = Cellphone::find($id);
        $cell->update([
            'status'=>2
        ]);
        return redirect('/assignments');*/
        //return redirect('/assignments');
    }
}

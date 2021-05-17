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
        $cellphones = Cellphone::orderBy('id','asc')
            ->with(['department','company','number'])
            ->paginate(10);
        
        return view('cellphones.index',[
            'cellphones' => $cellphones
        ]);
    }

    public function create()
    {
        $cellphone =new Cellphone();
        $companies=Company::all();
        $departments=Department::all();
        $numbers=Number::where('status','<>',1)->get();
        return view('cellphones.create',compact('companies','departments','numbers','cellphone'));
    }

    public function store( Request $request)
    {
        
        /*$this->validate($request,[
            'imei' =>'required',
            'brand' =>'required',
            'model' =>'required',
            'number_id' => 'required',
            'status'=>'required',
            'department_id' => 'required',
            'company_id' => 'required'
        ]);*/
        
        Cellphone::create([
            'imei' => $request->imei,
            'brand' => $request->brand,
            'model' => $request->model,
            'number_id' => $request->number,
            'status' => $request->status,
            'department_id' => $request->department_id,
            'company_id' => $request->company_id
        ]);
        $number=Number::find($request->number);
        $number->update(['status'=>1]);

        return redirect('/cellphones'); 
    }

    public function edit($id)
    {
        $cellphone = Cellphone::find($id);
        $companies=Company::all();
        $departments=Department::all();
        $numbers=Number::all();//where('status','<>',1)->get();
        return view('cellphones.edit',compact('cellphone','numbers','companies','departments'));
    }
    public function update(Cellphone $cellphone)
    {
       
        $cellphone->update([
            'imei' => request('imei'),
            'brand' => request('brand'),
            'model' => request('model'),
            'number_id' => request('number'),
            'status' => request('status'),
            'department_id' => request('department_id'),
            'company_id' => request('company_id')
        ]);
        $number=Number::find($cellphone->number_id);
        $number->update(['status'=>1]);
        return redirect('/cellphones');
       
    }
    public function show(Cellphone $cellphone)
    {
        return view('cellphones.show',compact('cellphone'));
    }
    //return redirect('/assignments');
}

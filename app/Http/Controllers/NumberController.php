<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Number;
use App\Company;

class NumberController extends Controller
{
    public function index()
    {
        $numbers = Number::paginate(10);
            
        return view('numbers.index',[
            'numbers' => $numbers
        ]);
    }

    public function create()
    {
        $number= new Number();
        $companies = Company::all();
        return view('numbers.create',compact('companies','number'));
    }

    public function store( Request $request)
    {
        $this->validate($request,[
            'number' =>'required',
            'company_id' =>'required'
            
        ]);
        Number::create([
            'number' => $request->number,
            'company_id' => $request->company_id,
            'status' => $request->status,
            'data_plan' => $request->data_plan
            
        ]);
        return redirect('/numbers'); 
    }
    public function show(Number $number)
    {
        return view('numbers.show',compact('number'));
    }
    public function edit($id)
    {
        
        $number = Number::find($id);
        
        $companies=Company::all();
        return view('numbers.edit',compact('number','companies'));
    }
    public function update(Number $number)
    {
        $number->update([
            'number' => request('number'),
            'company_id' => request('company_id'),
            'status' => request('status'),
            'data_plan'=> request('data_plan')
        ]);
        
        return redirect()->route('numbers.show',$number);
    }
}

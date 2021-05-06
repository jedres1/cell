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
        $companies = Company::all();
        return view('numbers.create',compact('companies'));
    }

    public function store( Request $request)
    {
        $this->validate($request,[
            'number' =>'required',
            'company_name' =>'required'
            
        ]);
        Number::create([
            'number' => $request->number,
            'company_name' => $request->company_name,
            'status' => 2,
            
        ]);
        return redirect('/numbers'); 
    }
}

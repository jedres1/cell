<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        dd('$request');
    }
}

@extends('layouts.panel')
@section('content')
<div class="container">
    <div>
    <a class='btn btn-info' href="{{ url('cellphones/create') }}">Add Cellphones</a>
    </div>
    <br>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Modelo</th>
                <th scope="col">Marca</th>
                <th scope="col">numero</th>
                <th scope="col">imei</th>
                <th scope="col">Empresa</th>
                <th scope="col">Departamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cellphones as $cellphone)
            <tr>
                <th scope="row">{{$cellphone->id}}</th>
                <td>{{$cellphone->model}}</td>
                <td>{{$cellphone->brand}}</td>
                <td>{{$cellphone->number}}</td>
                <td>{{$cellphone->imei}}</td>
                <td>{{$cellphone->company->company_name}}</td>
                <td>{{$cellphone->department->department_name}}</td>
                
            </tr>    
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection
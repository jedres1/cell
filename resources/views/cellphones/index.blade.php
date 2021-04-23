@extends('layouts.app')
@section('content')
<div class="container">
    <div>
<a class='btn btn-info' href="{{ url('cellphones/create') }}">Add Cellphones</a>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Modelo</th>
                <th scope="col">Marca</th>
                <th scope="col">numero</th>
                <th scope="col">imei</th>
                <th scope="col">Empresa</th>
                <th scope="col">Departamento</th>
                <th scope="col">Empleado</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cellphones as $cellphone)
            <tr>
                <th scope="row">{{$cellphone->id}}</th>
                <td>{{$cellphone->model}}</td>
               
            </tr>    
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection
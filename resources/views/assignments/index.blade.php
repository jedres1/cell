@extends('layouts.app')
@section('content')
<div class="container">
    <div>
<a class='btn btn-info' href="{{ url('assignments/create') }}">Add Assignment</a>
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
            @foreach ($assignments as $assignment)
            <tr>
                <th scope="row">{{$assignment->id}}</th>
                <td>{{$assignment->cellphone->model}}</td>
                <td>{{$assignment->cellphone->brand}}</td>
                <td>{{$assignment->cellphone->number}}</td>
                <td>{{$assignment->cellphone->imei}}</td>
                <td>{{$assignment->cellphone->company->company_name}}</td>
                <td>{{$assignment->cellphone->department->department_name}}</td>
                <td>{{$assignment->employee->employee_name}}</td>
                <td>{{$assignment->status}}</td>
            </tr>    
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection
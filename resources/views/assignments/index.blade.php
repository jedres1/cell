@extends('layouts.panel')
@section('content')
<div class="container">
    <div>
        <a class='btn btn-info' href="{{ url('assignments/create') }}">Add Assignment</a>
    </div>
    <br>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
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
                <td>{{$assignment->cellphone->model}}</td>
                <td>{{$assignment->cellphone->brand}}</td>
                <td>{{$assignment->cellphone->number}}</td>
                <td>{{$assignment->cellphone->imei}}</td>
                <td>{{$assignment->cellphone->company->company_name}}</td>
                <td>{{$assignment->cellphone->department->department_name}}</td>
                <td>{{$assignment->employee->employee_name}}</td>
                <td>{{$assignment->status==1?"Entregado":"Pendiente"}}</td>
            </tr>    
            @endforeach
            
        </tbody>
    </table>
    {{$assignments->links()}}
</div>
@endsection
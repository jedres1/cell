@extends('layouts.panel')
@section('content')
<div class="container">
    <div>
<a class='btn btn-info' href="{{ url('employees/create') }}">Add Employee</a>
    </div>
    <br>
    <table class="table  table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">Nombre </th>
                <th scope="col">Labora</th>
                <th scope="col">Area</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{$employee->employee_name}}</td>
                <td>{{$employee->company->company_name}}</td>
                <td>{{$employee->department->department_name}}</td>
                
            </tr>    
            @endforeach
            
        </tbody>
    </table>
    {{$employees->links()}}
</div>
@endsection
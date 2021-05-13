@extends('layouts.panel')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
        <p class="list-group-item ">Nombre: {{$employee->employee_name}}</p>
        <p class="list-group-item ">email: {{$employee->email}}</p>
        <p class="list-group-item ">Empresa: {{$employee->company->company_name}}</p>
        <p class="list-group-item ">Departamento: {{$employee->department->department_name}}</p>
        <p class="list-group-item ">cargo: {{$employee->job_title}}</p>
    </div>
  </div><br>
  <form class="row g-3" action="{{ route('employees.edit',$employee) }}" method="get">
    <div class="col-6 m3  ">
        <button type="submit" class="btn btn-info">Editar</button>
    </div>
    <div class="col-6 m3  ">
      <a href="{{ url('/employees') }}" class="btn btn-danger float-right">Regresar</a>
    </div>
  </form>
</div>
@endsection

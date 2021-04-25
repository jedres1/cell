@extends('layouts.panel')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form class="row g-3" action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="col-md-6">
          <label for="employee_name" class="form-label" >Nombre del empleado</label>
          <input type="text" class="form-control" name="employee_name" id="employee_name" value="{{ old('employee_name') }}" required>
        </div>
        <div class="col-md-3">
          <label for="company_id" class="form-label" >Labora en Empresa</label>
          <input type="text" class="form-control" name="company_id" id="company_id" value="{{old('company_id')}}">
        </div>
        <div class="col-md-3">
          <label for="department_id" class="form-label" >Area que desempeña</label>
          <input type="text" class="form-control" name="department_id" id="department_id" value="{{old('department_id')}}">
        </div>
        <br>
        <div class="col-6 m3">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <a href="{{ url('/employees') }}" class="btn btn-primary">Cancelar</a>
    </form>  
    </div>
  </div>
    
</div>

@endsection

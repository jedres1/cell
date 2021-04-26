@extends('layouts.panel')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form class="row g-3" action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="col-md-12">
          <label for="employee_name" class="form-label" >Nombre del empleado</label>
          <input type="text" class="form-control" name="employee_name" id="employee_name" value="{{ old('employee_name') }}" required>
        </div>
        <div class="col-md-6">
          <label for="company_id" class="form-label" >Empresa Titular</label>
            <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="company_id" id="company_id" value="{{old('company_id')}}">
              <option selected>Seleccione una Empresa</option>
              @foreach ( $companies as $company )
                <option value="{{$company->id}}">{{$company->company_name}}</option>
              @endforeach
              
            </select>
        </div>
        <div class="col-md-6">
          <label for="department_id" class="form-label" >Departamento Asignado</label>
          <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="department_id" id="department_id">
            <option selected>Seleccione un departmamento</option>
            @foreach ( $departments as $department )
                <option value="{{$department->id}}">{{$department->department_name}}</option>
            @endforeach
          </select>
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

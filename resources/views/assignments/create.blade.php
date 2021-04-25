@extends('layouts.panel')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form class="row g-3" action="{{ route('assignments.store') }}" method="POST">
        @csrf
        <div class="col-md-6">
          <label for="cellphone_id" class="form-label" >Celular</label>
          <input type="text" class="form-control" name="cellphone_id" id="cellphone_id" value="{{ old('cellphone_id') }}" required>
        </div>
        <div class="col-md-2">
          <label for="employee_id" class="form-label" >Empleado</label>
          <input type="text" class="form-control" name="employee_id" id="employee_id" value="{{old('employee_id')}}">
        </div>
        <div class="col-md-2">
          <label for="status" class="form-label" >Estatus</label>
          <input type="text" class="form-control" name="status" id="status" value="{{old('status')}}">
        </div>
        <br>
        <div class="col-6">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div class="col-6">
        <a href="{{ url('/assignments') }}" class="btn btn-primary">Cancelar</a>
    </form>  
    </div>
  </div>
    
</div>

@endsection

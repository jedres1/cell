@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form class="row g-3" action="{{ route('cellphones.store') }}" method="POST">
        @csrf
        <div class="col-md-6">
          <label for="model" class="form-label" >model</label>
          <input type="text" class="form-control" name="model" id="model" value="{{ old('model') }}" required>
        </div>
        <div class="col-md-6">
          <label for="brand" class="form-label" >Marca</label>
          <input type="text" class="form-control" name="brand" id="brand" value="{{old('brand')}}">
        </div>
        <div class="col-md-4">
          <label for="imei" class="form-label" >imei</label>
          <input type="text" class="form-control" name="imei" id="imei" value="{{old('imei')}}">
        </div>
        <div class="col-md-4">
          <label for="number" class="form-label" >number</label>
          <input type="text" class="form-control" name="number" id="number" value="{{old('number')}}">
        </div>
        <div class="col-md-4">
          <label for="company_id" class="form-label" >Empresa Titular</label>
          <input type="text" class="form-control" name="company_id" id="company_id" value="{{old('company_id')}}">
        </div>
        <div class="col-md-2">
          <label for="department_id" class="form-label" >Departamento Asignado</label>
          <input type="text" class="form-control" name="department_id" id="department_id" value="{{old('department_id')}}">
          <br>
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

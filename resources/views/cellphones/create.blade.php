@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form class="row g-3" action="{{ route('cellphones.store') }}" method="POST">
        @csrf
        <div class="col-md-6">
          <label for="model" class="form-label" >Modelo</label>
          <input type="text" class="form-control" id="model" value="{{ old('model') }}">
        </div>
        <div class="col-md-6">
          <label for="imei" class="form-label" >imei</label>
          <input type="text" class="form-control" id="imei" value="{{ old('imei') }}">
        </div>
        <div class="col-12">
          <label for="brand" class="form-label" >Marca</label>
          <input type="text" class="form-control" id="brand" value="{{ old('brand') }}" >
        </div>
        <div class="col-12">
          <label for="number" class="form-label" >Numero</label>
          <input type="text" class="form-control" id="number" value="{{ old('number') }}">
        </div>
        <div class="col-md-4">
          <label for="company" class="form-label" >Compañia</label><br>
          <select id="company" class="form-select" value="{{ old('company') }}">
            <option selected>Choose...</option>
            <option>Publimovil</option>
            <option>Publimagen</option>
            <option>Urbman</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="department" class="form-label" >Departamento</label>
          <input type="text" class="form-control" id="department" value="{{ old('department') }}">
        </div>
        <div class="col-md-2">
          <label for="employee" class="form-label" >Empleado</label>
          <input type="text" class="form-control" id="employee" value="{{old('employee')}}">
        </div>
        <br>
        <div class="col-6">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div class="col-6">
        <a href="{{ url('/cellphones') }}" class="btn btn-primary">Cancelar</a>
    </form>  
    </div>
  </div>
    
</div>

@endsection

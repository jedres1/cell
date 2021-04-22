@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form class="row g-3" action="{{ route('guardar') }}" method="POST">
        @
        <div class="col-md-6">
          <label for="model" class="form-label">Modelo</label>
          <input type="text" class="form-control" id="model">
        </div>
        <div class="col-md-6">
          <label for="imei" class="form-label">imei</label>
          <input type="text" class="form-control" id="imei">
        </div>
        <div class="col-12">
          <label for="brand" class="form-label">Marca</label>
          <input type="text" class="form-control" id="brand">
        </div>
        <div class="col-12">
          <label for="number" class="form-label">Numero</label>
          <input type="text" class="form-control" id="number">
        </div>
        <div class="col-md-4">
          <label for="company" class="form-label">Compañia</label><br>
          <select id="company" class="form-select">
            <option selected>Choose...</option>
            <option>Publimovil</option>
            <option>Publimagen</option>
            <option>Urbman</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="department" class="form-label">Departamento</label>
          <input type="text" class="form-control" id="department">
        </div>
        <div class="col-md-2">
          <label for="employee" class="form-label">Empleado</label>
          <input type="text" class="form-control" id="employee">
        </div>
        <br>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>  
    </div>
  </div>
    
</div>

@endsection

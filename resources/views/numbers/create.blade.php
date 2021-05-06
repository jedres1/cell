@extends('layouts.panel')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form class="row g-3" action="{{ route('numbers.store') }}" method="POST">
        @csrf
        <div class="col-md-6">
          <label for="number" class="form-label" >Numero de servicio</label>
          <input type="text" class="form-control" name="number" id="number" value="{{ old('number') }}" required>
        </div>
        <div class="col-md-6">
          <label for="company_name" class="form-label" >Empresa Titular</label>
            <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="company_name" id="company_name" value="{{old('company_name')}}">
              <option selected>Seleccione una Empresa</option>
              @foreach ( $companies as $company )
                <option value="{{$company->id}}">{{$company->company_name}}</option>
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
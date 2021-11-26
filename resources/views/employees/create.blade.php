@extends('layouts.panel')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form class="row g-3" action="{{ route('employees.store') }}" method="POST">
        @include('employees.partials.form-employee',['btnText'=>'Guardar'])
        <div class="col-6 m3">
          <a href="{{ url('/employees') }}" class="btn btn-warning float-right">Cancelar2</a>
        </div> 
      </form>  
    </div>
  </div>
    
</div>

@endsection

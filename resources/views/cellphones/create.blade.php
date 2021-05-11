@extends('layouts.panel')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form class="row g-3" action="{{ route('cellphones.store') }}" method="post">
        @include('cellphones\partials\form',['btnText'=>'Guardar'])  
        <div class="col-6 m3">
          <a href="{{ url('/cellphones') }}" class="btn btn-danger float-right">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

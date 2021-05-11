@extends('layouts.panel')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body shadow-sm">
      <form class="row g-3" action="{{ route('assignments.store') }}" method="POST">
        @include('assignments\partials\form-assignments')
        <div class="col-6 m3">
          <a href="{{ url('/assignments') }}" class="btn btn-primary float-right">Cancelar</a>
        </div>
    </form>  
    </div>
  </div>
    
</div>

@endsection

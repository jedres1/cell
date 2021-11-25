@extends('layouts.panel')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body shadow-sm">
      <script src="{{ asset('/js/assignment/recived.js') }}"></script> 
      <form class="row g-3" action="{{ route('assignments.store') }}" method="POST">
        @include('assignments\partials\form-assignments',['btnText'=>'Guardar'])
        <div class="col-6 m3">
          <a href="{{ url('/assignments') }}" class="btn btn-warning float-right">Cancelar</a>
        </div>
    </form>  
    </div>
  </div>
    
</div>
@endsection
@section('scripts')
 <script src="{{ asset('js/assignment/recived.js') }}"></script>   
@endsection
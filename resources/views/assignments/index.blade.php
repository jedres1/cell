@extends('layouts.panel')
@section('content')
<div class="container">
    <div>
        <a class='btn btn-info' href="{{ url('assignments/create') }}">Add Assignment</a>
    </div>
    <br>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Activas</a>
        </li>
        
        
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
            @include('assignments.partials.active-assignments')
        </div>
       
      </div>
    
    
</div>
@endsection
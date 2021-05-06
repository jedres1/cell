@extends('layouts.panel')
@section('content')
<div class="container">
    <div>
        <a class='btn btn-info' href="{{ url('numbers/create') }}">Add Number</a>
    </div>
    <br>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">numero</th>
                <th scope="col">Empresa</th>
                <th scope="col">Estado</th>  
            </tr>
        </thead>
        <tbody>
            @foreach ($numbers as $number)
            <tr>
                <td>{{$number->number}}</td>
                <td>{{$number->company_name}}</td>
                <td>{{$number->status==1?"Asignado":"No Asignado"}}</td>
                
            </tr>    
            @endforeach
            
        </tbody>
    </table>
    {{$numbers->links()}}
</div>
@endsection
@extends('layouts.panel')
@section('content')
<div class="container">
    <div>
        <a class='btn btn-info' href="{{ url('cellphones/create') }}">Add Cellphones</a>
    </div>
    <br>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">Modelo</th>
                <th scope="col">Marca</th>
                <th scope="col">numero</th>
                <th scope="col">imei</th>
                <th scope="col">Empresa</th>
                <th scope="col">Departamento</th>
                <th scope="col">Estado</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cellphones as $cellphone)
            <tr>
                <td>{{$cellphone->model}}</td>
                <td>{{$cellphone->brand}}</td>
                <td>{{$cellphone->number->number}}</td>
                <td>{{$cellphone->imei}}</td>
                <td>{{$cellphone->company->company_name}}</td>
                <td>{{$cellphone->department->department_name}}</td>
                <td>{{$cellphone->status==1?"Asignado":"Disponible"}}</td>
                <td><a class="btn btn-icon btn-primary btn-sm" href="{{route('cellphones.show',$cellphone)}}"><i class="ni ni-mobile-button text-dark"></i></a></td>
            </tr>    
            @endforeach
            
        </tbody>
    </table>
    {{$cellphones->links()}}
</div>
@endsection
@extends('layouts.panel')
@section('content')
<div class="container">
<h2 class="header"></h2>
    <ul class="list-group">
        @foreach ($assignment as $item)
        <li class="list-group-item list-group-item-success">Acuerdo de uso por empleado</li>
        
        <li class="list-group-item ">Labora en: {{ $item->employee->company->company_name }}</li>
        <li class="list-group-item ">Empleado: {{ $item->employee->employee_name }}</li>
        <li class="list-group-item border-0 mb-3 shadow-sm">Departamento: {{ $item->employee->department->department_name }}</li>
        <li class="list-group-item list-group-item-success">Celular</li>
        <li class="list-group-item ">Celular pertenece a : {{ $item->cellphone->company->company_name }}</li>
        <li class="list-group-item ">Modelo: {{ $item->cellphone->model }}</li>
        <li class="list-group-item ">Marca: {{ $item->cellphone->brand }}</li>
        <li class="list-group-item ">Numero: {{ $item->cellphone->number }}</li>
        <li class="list-group-item border-0 mb-3 shadow-sm">Acuerdo en Estado: {{ $item->cellphone->status==1?'Activo':'Pendiente' }}</li>
        @endforeach
    </ul>
    <div class="form-row"> 
        <div class="col-md-3 mb-3">
            <a class="btn btn-success" href="{{url('/assignments')}}">Regresar</a>
        </div>     
        <div class="col-md-3 mb-3">
            <a class="btn btn-warning" href="{{route('download.acuerdo',$item->id)}}">Acuerdo <i class="ni ni-archive-2 text-white"></i></a>
        </div>      
        <form class="col-md-3 mb-3" method="POST" action="{{route('assignments.update',$item->id)}}">
            @csrf @method('PATCH')
            <button type="submit" class="btn btn-danger" >Desasignar</button>
        </form>
    </div>
</table>
</div>
@endsection
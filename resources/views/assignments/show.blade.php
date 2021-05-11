@extends('layouts.panel')
@section('content')
<div class="container">
<h2 class="header"></h2>
    
        @foreach ($assignment as $item)
        <p class="list-group-item list-group-item-success">Detalle de empleado</p>
        
        <p class="list-group-item ">Labora en: {{ $item->employee->company->company_name }}</p>
        <p class="list-group-item ">Empleado: {{ $item->employee->employee_name }}</p>
        <p class="list-group-item ">Cargo: {{ $item->employee->job_title }}</p>
        <p class="list-group-item border-0 mb-3 shadow-sm">Departamento: {{ $item->employee->department->department_name }}</p>
        <p class="list-group-item list-group-item-success">Detalle de linea Celular</p>
        <p class="list-group-item ">Celular pertenece a : {{ $item->cellphone->company->company_name }}</p>
        <p class="list-group-item ">Modelo: {{ $item->cellphone->model }}</p>
        <p class="list-group-item ">Marca: {{ $item->cellphone->brand }}</p>
        <p class="list-group-item ">Numero: {{ $item->cellphone->number->number }}|{{ $item->cellphone->number->company->company_name }}</p>
        <p class="list-group-item border-0 mb-3 shadow-sm">Acuerdo en Estado: {{ $item->cellphone->status==1?'Activo':'Entrega Pendiente' }}</p>
        @endforeach
  
    <div class="form-row"> 
        <div class="col-4 mb-3">
            <a class="btn btn-success" href="{{url('/assignments')}}">Regresar</a>
        </div>     
        <div class="col-4 mb-3 text-center">
            <a class="btn btn-warning" href="{{route('download.acuerdo',$item->id)}}">Acuerdo <i class="ni ni-archive-2 text-white"></i></a>
        </div>      
        <form class="col-4 mb-3" method="get" action="{{route('assignments.edit',$item->id)}}">
            
            <button type="submit" class="btn btn-danger float-right">Editar</button>
        </form>
    </div>
</table>
</div>
@endsection
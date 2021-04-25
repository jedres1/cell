@extends('layouts.panel')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Welcome') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
                <div class="col-12">           
            
                        <img class="rounded mx-auto d-block" src="/img/icons/home.svg" alt="Inventario celulares">
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
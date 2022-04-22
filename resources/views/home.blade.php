@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenida!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Este es una evaluacion echa por Juan Aviles en las tecnologias de: Laravel, CSS, Bootstrap, Jquery, JavaScript, y HTML. Para ir al crud oprime el boton "Empleados" en la navbar') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

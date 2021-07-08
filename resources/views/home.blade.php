@extends('app')
@section('home')
    active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="col-md-10 col-md-offset-1">
                    @if(Session::has('mensajeHome'))
                        <p class='alert alert-success alert-dismissible' role='alert'>
                            <button type='button' class='close' data-dimiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ Session::get('mensajeHome') }}
                        </p>
                    @endif
                    <br>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('app')
@section('security')
active
@endsection

@section('content')
<div id='content' class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if(Session::has('inborrable'))
            <p class='alert alert-warning alert-dismissible' role='alert'>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {!! Session::get('inborrable') !!}
            </p>
            @endif
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class='text-center'>
                        <span class='pull-left'> <a href="{{ url('/security/perfiles') }}" class="btn btn-success btn-xs"><span class="icon-arrow-left"></span> Atrás</a></span>
                        <span class='pull-center'><span class="icon-users"></span> Ver Perfil: <strong>{{$perfil->nombre}}</strong></span>
                    </div>
                </div>
                <div class="panel-body">
                    <div class='form-horizontal'>
                        <div class='form-group'>
                            {!! Form::label('lNombre','Nombre:',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::label($perfil->nombre,null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class='panel-footer'>
                    <table align='center'>
                        <tr>
                            <td>
                                @if($permisos->editar)
                                <a title='Editar' class='btn btn-success' href="{{ route('security.perfiles.edit',$perfil) }}">Editar</a>
                                @endif
                            </td>
                            <td style='padding-left:4px;'>
                                @if($permisos->borrar)
                                <a title='Eliminar' data-target="#confirmdelete" data-id="{{$perfil->id}}" data-toggle="modal" class='btn btn-danger'>Eliminar</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('security.perfiles.partials.confirmdelete');
@endsection

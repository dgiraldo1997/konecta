@extends('app')
@section('security')
active
@endsection

@section('content')
<div id='content' class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if(Session::has('message'))
            <p class='alert alert-success alert-dismissible' role='alert'>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('message') }}
            </p>
            @endif
            @if(Session::has('inborrable'))
            <p class='alert alert-warning alert-dismissible' role='alert'>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {!!Session::get('inborrable') !!}
            </p>
            @endif
            <p>
                @if($permisos->crear)
                <a title='Agregar' class='btn btn-success' href="{{ route('security.perfiles.create') }}" role='button'><span class="glyphicon glyphicon-plus"></span>Crear Perfil</a>
                @else
                <a title='Agregar' data-target="#sinpermisos" data-toggle="modal" class='btn btn-success btndesactivar' role='button'><span class="glyphicon glyphicon-plus"></span> Crear Perfil</a>
                @endif
            </p>
            
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-lock"></span> Lista de Perfiles</div>

                <div class="panel-body">
                    <table class='table table-striped table-hover'>
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>

                        @foreach($perfiles as $perfil)
                        <tr data-id='{{ $perfil->id }}'>
                            <td>{{ $perfil->nombre }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a title='Ver'  href="{{ route('security.perfiles.show',$perfil) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        </td>
                                        <td style='padding-left:8px;'>
                                            @if($permisos->editar)
                                            <a title='Editar' style="color:green" href="{{ route('security.perfiles.edit',$perfil) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                            @else
                                            <a title='Editar' data-target="#sinpermisos" data-toggle="modal" class='btn btn-success btn-xs btndesactivar'><span class="glyphicon glyphicon-pencil"></span></a>
                                            @endif
                                        </td>
                                        <td style='padding-left:8px;'>
                                            @if($permisos->borrar)
                                            <a title='Eliminar' onclick="eliminar(this)"  style="color:red;cursor:pointer;" data-target="#confirmdelete" data-id="{{$perfil->id}}" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a>
                                            @else
                                            <a title='Eliminar' style="color:red;cursor:pointer;" data-target="#sinpermisos" data-toggle="modal" class='btn btn-danger btn-xs btndesactivar'><span class="glyphicon glyphicon-trash"></span></a>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $perfiles->total() }} registros.<br>
                    {!! $perfiles->setPath('')->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@include('security.perfiles.partials.confirmdelete');
@endsection
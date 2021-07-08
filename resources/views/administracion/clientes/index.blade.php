@extends('app')
@section('administracion')
active
@endsection
@section('content')
<div id='content' class="container">
    <div class="row">
        <div class="col-md-12">

            <div><span id='mensajesinterfaz' style='display: none;'></span></div>
            @if(Session::has('message'))
            <p class='alert alert-success alert-dismissible' role='alert'>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('message') }}
            </p>
            @endif
            <p>
                @if($permisos->crear)
                    <a title='Agregar' class='btn btn-success' href="{{ route('administracion.clientes.create') }}" role='button'><span class="glyphicon glyphicon-plus"></span> Crear Clinete</a>
                @else
                <a title='Agregar' data-target="#sinpermisos" data-toggle="modal" class='btn btn-success btndesactivar' role='button'><span class="glyphicon glyphicon-plus"></span> Crear Acto Inseguro</a>
                @endif
            </p>

            <div class="panel panel-primary">
                <div class="panel-heading"><span class="icon-user-tie"></span> Lista de Clientes</div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class='table table-striped table-hover'>
                        <tr>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>

                        @include('administracion.clientes.partials.buscar')

                        @foreach($clientes as $cliente)
                        <tr data-id='{{ $cliente->id }}'>
                            <td onclick="window.location.href='{{route('administracion.clientes.show',$cliente)}}'" style="cursor: pointer"><span class="label label-primary">{{$cliente->documento}} </span></td>
                            <td onclick="window.location.href='{{route('administracion.clientes.show',$cliente)}}'" style="cursor: pointer">{{$cliente->name}}</td>
                            <td onclick="window.location.href='{{route('administracion.clientes.show',$cliente)}}'" style="cursor: pointer">{{$cliente->telefono}}</td>
                            <td onclick="window.location.href='{{route('administracion.clientes.show',$cliente)}}'" style="cursor: pointer">{{$cliente->direccion}}</td>
                            <td onclick="window.location.href='{{route('administracion.clientes.show',$cliente)}}'" style="cursor: pointer">@if($cliente->activo==0) <span class="label label-danger">Inactivo</span> @else <span class="label label-success">Activo</span> @endif</td>
                            <td>
                                <table>
                                    <tr data-id='{{ $cliente->id }}'>
                                        <td>
                                            <a title='Ver'  href="{{ route('administracion.clientes.show',$cliente) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        </td>
                                        <td style='padding-left:8px;'>
                                            @if($permisos->editar)
                                                <a title='Editar' style="color:green" href="{{ route('administracion.clientes.edit',$cliente) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                            @else
                                                <a title='Editar' data-target="#sinpermisos" data-toggle="modal" class='btn btn-success btn-xs btndesactivar'><span class="glyphicon glyphicon-pencil"></span></a>
                                            @endif
                                        </td>
                                        <td style='padding-left:8px;'>
                                            @if($permisos->borrar)
                                                <a title='Eliminar' onclick="eliminar(this)"  style="color:red;cursor:pointer;" data-target="#confirmdelete" data-id="{{$cliente->id}}" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a>
                                            @else
                                                <a title='Eliminar' style="color:red;cursor:pointer;" data-target="#sinpermisos" data-toggle="modal" class='btn btn-danger btn-xs btndesactivar'><span class="glyphicon glyphicon-trash"></span></a>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
                <div class="panel-footer">
                    {{ $clientes->total() }} registros.<br>
                    {!! $clientes->setPath('')->appends(Request::all())->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@include('administracion.clientes.partials.confirmdelete');
@include('administracion.clientes.partials.sinpermisos');
@endsection

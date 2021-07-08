@extends('app')
@section('security')
active
@endsection

@section('content')
<div id='content' class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @if(Session::has('message'))
            <p class='alert alert-success alert-dismissible' role='alert'>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('message') }}
            </p>
            @endif

            <p>
                @if($permisos->crear)
                <a title='Agregar' class='btn btn-success' href="{{ route('security.users.create') }}" role='button'><span class="glyphicon glyphicon-plus"></span>Crear Usuario</a>
                @else
                <a title='Agregar' data-target="#sinpermisos" data-toggle="modal" class='btn btn-success btndesactivar' role='button'><span class="glyphicon glyphicon-plus"></span>Crear Usuario</a>
                @endif
            </p>
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Lista de Usuarios</div>

                <div class="panel-body">
                    <table class='table table-striped'>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Perfil</th>
                            <th>Acciones</th>
                        </tr>
                        @include('security.users.partials.buscar')
                        @foreach($users as $user)
                        <tr data-id='{{ $user->id }}'>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getPerfil->nombre }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            @if($permisos->editar)
                                            <a title='Editar' class='btn btn-success btn-xs' href="{{ route('security.users.edit',$user) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            @else
                                            <a title='Editar' data-target="#sinpermisos" data-toggle="modal" class='btn btn-success btn-xs btndesactivar'><span class="glyphicon glyphicon-pencil"></span></a>
                                            @endif
                                        </td>
                                        <td style='padding-left:8px;'>@include('security.users.partials.deletelist')</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $users->total() }} registros.<br>
                    {!! $users->setPath('')->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Ventana Modal -->
<div class="modal fade" id="sinpermisos" tabindex="-1" role="dialog" aria-labelledby="sinpermisosLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading"><h4>USUARIO NO AUTORIZADO<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h4></div>
                    <div class="panel-body">
                        <h1 class="col-md-2"><span style='color:#a94442;'class="glyphicon glyphicon-lock"> </span></h1>
                        <div class="col-md-10">Lo sentimos, usted no tiene permisos suficientes para ver este contenido.
                            <br>
                            Contacte con su administrador del sistema
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
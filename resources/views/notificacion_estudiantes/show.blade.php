@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Notificaciones > Ver</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('notificacion_estudiantes.index') }}">Notificaciones</a></li>
                        <li class="breadcrumb-item active">Ver</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <p><strong>Fecha: </strong> {{date("d/m/Y",strtotime($notificacion_estudiante->created_at))}}</p>
                                    <p><strong>Materia: </strong> {{$notificacion_estudiante->materia->nombre}}</p>
                                    <p><strong>Trimestre: </strong> {{$notificacion_estudiante->trimestre}}</p>
                                    <p><strong>Área: </strong> {{$notificacion_estudiante->txt_area}}</p>
                                    <p><strong>No. Actividad: </strong> {{$notificacion_estudiante->no_actividad}}</p>
                                    <p><strong>Nota: </strong> {{$notificacion_estudiante->nota}}</p>
                                    <p><strong>Descripción: </strong> {{$notificacion_estudiante->descripcion}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
@endsection
@section('scripts')
@endsection

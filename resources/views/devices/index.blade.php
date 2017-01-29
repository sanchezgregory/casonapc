@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>{{ $title }}</h3></div>

                    <div class="panel-body">
                        @foreach($departments as $department)
                            <ul>
                                <li><strong>{{ $department->name }}</strong>
                                    @foreach($department->devices as $device)
                                        <br>
                                        @if ($device->active)
                                            <a href="{{ route('editDevice',$device) }}"> <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                            <a href="{{ route('deleteDevice',$device) }}"><i class="fa fa-trash-o fa-2x"></i></a>
                                            <a href="{{ route('createStatusDevice',$device) }}">{{ $device->description }}</a>
                                        @else
                                            <div class="pull-right"><button type="button" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#myModal{{ $device->id }}">
                                                <i class="fa fa-refresh fa-1x" aria-hidden="true"></i> regresar
                                            </button> {{ $device->description }}
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal{{ $device->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">DEVOLVER A OPERATIVO</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            Regresar el equipo en funcionamiento!{{ $device->description }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                            <a href="{{ route('deleteStatusDevice', $device->id) }}" class="btn btn-primary">Aceptar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

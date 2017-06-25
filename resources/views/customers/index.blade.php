@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Listado de clientes</h3></div>

                    <div class="panel-body">
                        @foreach($clients as $client)
                            <ul>
                                <li><strong><a href="{{ route('editCustomer', $client->id) }}">{{ $client->FullName }}</a></strong>
                                        <br>
                                        @if (!$client->active)
                                           <ul>
                                               <li>
                                                   {{ $client->email}} {{ $client->phone}} {{ $client->address}}
                                           </ul>
                                        @else
                                            <div class="pull-right"><button type="button" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#myModal{{ $client->id }}">
                                                <i class="fa fa-refresh fa-1x" aria-hidden="true"></i> regresar
                                            </button> {{ $client->email }}
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">DEVOLVER A OPERATIVO</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            Regresar el equipo en funcionamiento!{{ $client->description }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                            <a href="{{ route('deleteStatusDevice', $client->id) }}" class="btn btn-primary">Aceptar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                            </ul>
                        @endforeach
                        {{ $clients->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

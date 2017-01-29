@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title }}
                    <div class="pull-right"> {{ $now }}</div>
                    </div>

                    <div class="panel-body">
                        <form class = "form-horizontal" role="form" method="post"  action="{{ route('storeStatusDevice', $device->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripcion:</label>
                                <div class="col-md-6">
                                    <input type="text" readonly class="form-control" name="device_id" value="{{ $device->description }}">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-md-4 control-label">Codigo</label>
                                    <div class="col-md-6">
                                        <input type="text" readonly class="form-control" name="code" value="{{ $device->code }}">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Observacion</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="observation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-6">
                                    <select name="status_id">
                                            @foreach($status as $statu)
                                                <option value="{{ $statu->id }}">
                                                    {{ $statu->name }}</option>
                                            @endforeach
                                        </select>
                                    </select>
                                </div>
                            </div>
                    </div>
                        <div class = "form-group">
                            <button class="btn btn-primary btn-block" type="submit">Aceptar</button>
                        </div>

                        </form>
                    <hr>
                    <H4 ALIGN="CENTER">HISTORIAL DE REPARACIONES DEL EQUIPO</H4>

                    <table class="table table-responsive">
                        <tr>
                            <th>ID</th>
                            <th>Status</th>
                            <th>Observacion</th>
                            <th>Usuario</th>
                            <th>Fecha</th>
                        </tr>
                        <hr>
                        {{ $device->users[0]->firs_name }}
                        <hr>

                    @foreach($device->statuses->sortByDesc('pivot.created_at') as $status)

                        <tr>
                            <td>{{$status->id}}</td>
                            <td>{{ $status->name }}</td>
                            <td>{{ $status->pivot->observation }}</td>
                            <td>{{ $status->userDevice($status->pivot->user_id) }}</td>
                            <td>{{ $status->pivot->created_at }}</td>
                        </tr>
                    @endforeach
                        </table>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

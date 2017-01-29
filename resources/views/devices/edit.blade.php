@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title }}</div>

                    <div class="panel-body">
                        <form class = "form-horizontal" role="form" method="post"  action="{{ route('updateDevice', $device->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="put">


                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripcion:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="description" value="{{ $device->description }}">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-md-4 control-label">Codigo</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="code" value="{{ $device->code }}">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Departamento</label>
                                <div class="col-md-6">
                                    <select name="department_id">
                                                <option value="{{ $device->department->id }}">{{ $device->department->name }}</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">
                                                    {{ $department->name }}</option>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

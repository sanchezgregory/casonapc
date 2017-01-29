@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title }}</div>

                    <div class="panel-body">
                        <form class = "form-horizontal" role="form" method="post"  action="{{ route('updateDepartment', $department->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="put">


                            <div class="form-group">
                                <label class="col-md-4 control-label">Departamento:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $department->name }}">
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

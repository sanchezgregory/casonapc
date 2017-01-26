@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">NEW POST</div>

                    <div class="panel-body">
                        <form class = "form-horizontal" role="form" method="post"  action="{{ url('publish') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Titulo</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Post</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="content" value="{{ old('content') }}">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Aceptar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

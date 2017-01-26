@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">BIENVENIDO ---</div>

                @include('partials/errors')
                @include('partials/success')

                <div class="panel-body">
                    You are logged in! {{ request()->ip() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

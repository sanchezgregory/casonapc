@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editando a: {{ $customer->FullName }}</div>

                    <div class="panel-body">
                        <form class = "form-horizontal" role="form" method="post"  action="{{ route('updateCustomer',$customer->id) }}">

                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Cedula:</label>
                                <div class="col-md-6">
                                    <input type="text" value="{{ $customer->cedula }}" class="form-control" maxlength="8" minlength="7" name="cedula" value="{{ old('cedula') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-md-4 control-label">Nombre</label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{ $customer->first_name }}" class="form-control"  name="first_name" value="{{ old('first_name') }}">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Apellido</label>
                                <div class="col-md-6">
                                    <input type="text" value="{{ $customer->last_name }}" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Telefono</label>
                                <div class="col-md-6">
                                    <input type="text" value="{{ $customer->phone }}" class="form-control" name="phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">E-mail</label>
                                <div class="col-md-6">
                                    <input type="text" value="{{ $customer->email }}" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Direccion</label>
                                <div class="col-md-6">
                                    <input type="text" value="{{ $customer->address }}" class="form-control" name="address" value="{{ old('address') }}">
                                </div>
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

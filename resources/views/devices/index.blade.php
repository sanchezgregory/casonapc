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
                                        <a href="{{ route('deleteDevice',$device) }}"><i class="fa fa-wrench fa-2x" aria-hidden="true"></i></a>
                                        <a href="{{ route('deleteDevice',$device) }}"><i class="fa fa-trash-o fa-2x"></i></a>
                                        <a href="{{ route('editDevice',$device) }}"> {{ $device->description }}</a>

                                    @endforeach
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

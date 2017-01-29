@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title }}</div>

                    <div class="panel-body">
                        @foreach($status as $statu)
                            <ul>
                                <a href="{{ route('deleteStatus',$statu) }}"><i class="fa fa-trash-o"></i></a>
                                <a href="{{ route('editStatus', $statu) }}"><strong>{{ $statu->name }}</strong></a>

                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

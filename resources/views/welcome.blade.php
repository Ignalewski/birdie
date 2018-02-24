@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(count($notes) == 0)
                <div class="panel panel-default">
                    <div class="panel-body">
                            Welcome
                    </div>
                </div>
                @endif
                @foreach($notes as $note)
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $note['title'] }} - posted by <b>
                            <a href="{{ route('user', ['id' => $note['user']['id']]) }}">{{ $note['user']['name'] }}</a>
                        </b> at {{ $note['created_at'] }}</div>

                    <div class="panel-body">
                        {{ $note['contents'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! You can now
                    <a href="{{ route('add_note') }}">add a note</a>.
                </div>
            </div>

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

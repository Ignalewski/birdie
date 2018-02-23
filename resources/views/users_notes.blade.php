@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $user->email }}</div>

                    <div class="panel-body">
                        @if(count($user->notes) == 0)
                            This user has no notes.
                        @endif
                        @foreach($user->notes as $note)
                            <div>
                                <div>
                                    {{ $note->title }}
                                </div>
                                <div>
                                    {{ $note->contents }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

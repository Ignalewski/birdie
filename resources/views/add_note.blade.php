@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add a new note</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('post_note') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title"
                                           required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contents" class="col-md-4 control-label">Contents</label>

                                <div class="col-md-6">
                                    <textarea id="contents" class="form-control" name="contents" required
                                              style="height:150px;"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

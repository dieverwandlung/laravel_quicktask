@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> {{ trans('language.updateButton') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

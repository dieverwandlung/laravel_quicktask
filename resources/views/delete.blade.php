@extends('layouts.app')

@section('content')
    <div class="panel-body">
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('DELETE')}}
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}" disabled>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <p class="text text-danger">
                        {{ trans('language.warningMessage') }}
                    </p>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> {{ trans('language.deleteButton') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

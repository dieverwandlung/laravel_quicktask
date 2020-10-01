@extends('layouts.app')

@section('content')
    <div class="panel-body">
        @include('common.errors')

        @if(session('notice'))
            <div class="alert alert-success">
                {{ session('notice') }}
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">{{ trans('language.formName') }}</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> {{ trans('language.addButton') }}
                    </button>
                </div>
            </div>
        </form>

        @if(count($tasks) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{ trans('language.columnId') }}</th>
                    <th scope="col">{{ trans('language.columnName') }}</th>
                    <th scope="col">{{ trans('language.columnCreatedAt') }}</th>
                    <th scope="col">{{ trans('language.columnUpdatedAt') }}</th>
                    <th scope="col">{{ trans('language.columnUpdate') }}</th>
                    <th scope="col">{{ trans('language.columnDelete') }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $t)
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->name }}</td>
                            <td>{{ $t->created_at }}</td>
                            <td>{{ $t->updated_at }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('tasks.edit', $t->id) }}"><i class="fa fa-pen"> {{ trans('language.updateButton') }}</i></a>
                            </td>
                            <td>
                                <form action="{{ route('tasks.destroy', $t->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"> {{ trans('language.deleteButton') }}</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

@extends('layout')

@section('content')
    <div class"row">
        <div class"col-lg-6 col-lg-offset-3">
            <form action="{{ route('create.todo')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="todo" id="todo" class"form-control input-lg" placeholder="Create a new Todo">
            </form>
        </div>
    </div>
    @foreach ($todos as $todo)
        {{ $todo->todo }} <a class="btn btn-sm btn-danger" href="{{ route('todo.delete', ['id' => $todo->id]) }}"><span class="fas fa-trash-alt"></span></a>
        <a class="btn btn-sm btn-primary" href="{{ route('todo.update', ['id' => $todo->id]) }}"><span class="fas fa-edit"></span></a>
        
        @if(!$todo->completed)
            <a class="btn btn-sm btn-success" href="{{ route('todos.completed', ['id' => $todo->id]) }}"><span class="fas fa-check-square">Done!</span></a>
        @else
            <span class"text-success btn btn-success">Completed!</span>
        @endif
         <hr>
    @endforeach
@stop
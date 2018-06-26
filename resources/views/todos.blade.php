@extends('layout')

@section('content')
	
	<form action="todo/create" method="POST">
		{{ csrf_field() }}
		<input type="text" class="form-control input-lg" name="todo" placeholder="Write new todo">
	</form>
	<br />
	@foreach($todos as $todo)
		{{ $todo->todo }}  <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger">X</a> <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-primary">U</a>

		@if(!$todo->completed)
			<a href="{{ route('todo.completed', ['id' => $todo->id]) }}" class="btn btn-sucess">Mark Completed</a>
		@endif
		<hr />
	@endforeach
@stop
@extends('layout')

@section('content')
	
	<form action="{{ route('todo.save', ['id' => $todo->id ])}}" method="POST">
		{{ csrf_field() }}
		<input type="text" class="form-control input-lg" name="todo" value= "{{ $todo->todo }}" placeholder="Update todo">
	</form>
	
@stop
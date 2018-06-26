<?php

namespace App\Http\Controllers;

use App\Todo;
use Session;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index() {
    	$all_todos = Todo::All();
    	return view('todos')->with('todos', $all_todos);
    }

    public function store(Request $request) {
    	$todo = new Todo;
    	$todo->todo = $request->todo;

    	$todo->save();

    	Session::flash('Success', 'Record has been created.');

    	return redirect()->back();

    }

    public function del($id) {
    	$todo = Todo::find($id);

    	if (!empty($todo)) {
	    	$todo->delete();
	    }
	    Session::flash('Success', 'Record has been deleted.');
    	return redirect()->back();
    }

    public function update($id) {
    	$todo = Todo::find($id);

    	return view('update')->with('todo', $todo);
    }

    public function save(Request $request, $id) {
    	$todo = Todo::find($id);

    	if (!empty($todo)) {
    		$todo->todo = $request->todo;
    		$todo->save();
    	}
   		
   		Session::flash('Success', 'Record has been updated.');
    	return redirect()->route('todos');

    }

    public function completed($id) {
    	$todo = Todo::find($id);

    	if (!empty($todo)) {
    		$todo->completed = 1;
    		$todo->save();
    	}

    	Session::flash('Success', 'Record has been completed.');
    	return redirect()->route('todos');
    }
}


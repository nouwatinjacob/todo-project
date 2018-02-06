<?php

namespace App\Http\Controllers;

use App\Todo;

use Session;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
    * This Method returns the todo in the db 
    * 
    * @return todo  
    */      
    public function index()
    {   
        $todos = Todo::all();

        return view('todos')->with('todos', $todos);
    }

    /**
     * This method save todo into the database
     * 
     * @return void
     */
    public function store(Request $request)
    {        
        $todo = new Todo;

        $todo->todo = $request->todo;
        $todo->save();

        Session::flash('success', 'Your Todo has been created');

        return redirect()->back();
    }

    /**
    * Delete each todo
    *
    * @return void
    *
    */
    public function delete($id)
    {
        
        $todo = Todo::find($id);

        $todo->delete();

        Session::flash('success', 'Your Todo has been deleted');

        return redirect()->back();
    }

    /**
    * Update a todo
    *
    * @return void
    *
    */
    public function update($id)
    {
        
        $todo = Todo::find($id);

        return view('update')->with('todo', $todo);
    }

    /**
    * Save Updated a todo
    *
    * @return void
    *
    */
    public function save(Request $request, $id)
    {
        
        $todo = Todo::find($id);

        $todo->todo = $request->todo;
        $todo->save();

        Session::flash('success', 'Your Todo was updated');

        return redirect('todos');
    }

    public function marked($id)
    {
        $todo = Todo::find($id);

        $todo->completed = 1;
        $todo->save();

        Session::flash('success', 'Your Todo has been marked completed');

        return redirect()->back();
    }
}

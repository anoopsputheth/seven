<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;



use Validator;

use App\Http\Requests\TodoCreateRequest;

class TodoController extends Controller
{
    
    public function index()
    {

        $todos = Todo::all();

        //return $todos;
        return view('todos.index', compact('todos'));
    }


    public function create()
    {

        return view('todos.create');
    }


    public function store(TodoCreateRequest $request)
    {
    

        Todo::create($request->all());

        return redirect()->back()->with('message', 'Todo created successfully');
    }


    public function edit(Todo $todo)
    {  
        
       //$todo = Todo::find($id);

        return view('todos.edit', compact('todo'));
    }


    public function update(TodoCreateRequest $request, Todo $todo)
    {  
        //dd($request->all());
     $todo->update(['title'=> $request->title]);

     return redirect(route('todo.index'))->with('message', 'Todo created successfully');

        return view('todos.edit', compact('todo'));
    }


}

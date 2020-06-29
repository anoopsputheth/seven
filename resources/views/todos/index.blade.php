@extends('todos.layout')


@section('content')


        <h1 class="text-2xl"> All your TODOs </h1>

        <ul>

            @foreach($todos as $todo)

            <li> 
            
                 <p> {{ $todo->title }} </p>


                 <a href="{{ url('/todos/'.$todo->id.'/edit') }}" class="mx-5 py-5 bg-orange-400">Edit</a>


            
            </li>

            @endforeach


        </ul>


 @endsection



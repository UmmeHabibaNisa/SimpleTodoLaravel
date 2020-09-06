<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todoview');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->check_box = 0;
        $todo->save();
        //print_r ($request);
        //return $request;
        return json_encode($todo);
        //return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        $todos = Todo::all();
        //print_r($todos);
       // foreach ($todos as $todo) {
           //echo $todo;
       // }
        return view('todoshow')->with('tableshow', $todos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todoedit')->with('showtables', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //echo $request->title;
        $todo->title = $request->title;
        $todo->check_box = $request->boolean('check_box');
        $todo->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //echo $todo;
        $todo->delete();
        return redirect('/');
    }

    public function checkBox(Request $request)
    {
        $post = Todo::find($request->id);
        $post->check_box = $request->check_box;
        $post->save();
        return ($request);
        //$todo->check_box = $request->boolean('check_box');

    }
}

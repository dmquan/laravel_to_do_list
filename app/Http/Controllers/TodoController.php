<?php

namespace App\Http\Controllers;

use App\TodoModel;
use View;
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
        $todos    = TodoModel::all();
        // load the view
        return view('todo.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new TodoModel();
        $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);

        $todo->saveTodo($request);
        return redirect('/home')->with('success', 'New todo has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = TodoModel::where('id', $id)
            ->first();

        return view('todo.edit', compact('todo', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = new TodoModel();
        $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
        $request['id'] = $id;
        $todo->updateTodo($request);

        return redirect('/home')->with('success', 'New todo has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = TodoModel::find($id);
        $todo->delete();

        return redirect('/home')->with('success', 'Todo has been deleted!!');
    }
}

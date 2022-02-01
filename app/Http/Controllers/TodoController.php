<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact(['todos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoStoreRequest $request)
    {
        $todo = new Todo();

        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->status = 'ToDo';

        $todo->save();

        Session::flash('add_todo','Todo added successfully.');
        return back();
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
        $todo = Todo::findOrFail($id);
        $options = [];
        if($todo->status == 'ToDo') {
            array_push($options,'InProgress');
        }elseif($todo->status == 'InProgress') {
            array_push($options,'Blocked');
            array_push($options,'InQA');
        }elseif($todo->status == 'Blocked') {
            array_push($options,'ToDo');
        }elseif($todo->status == 'InQA') {
            array_push($options,'ToDo');
            array_push($options,'Done');
        }elseif($todo->status == 'Done') {
            array_push($options,'Deployed');
        }
        $todo->status = $options;

        return view('todos.edit', compact(['todo']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoUpdateRequest $request, $id)
    {
        $todo = Todo::findOrFail($id);

        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->status = $request->status;

        $todo->save();

        Session::flash('update_todo','Todo Updated Successfully');
        return redirect(route('todo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

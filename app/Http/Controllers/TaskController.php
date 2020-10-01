<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    private function redirectTo ($message)
    {
        return redirect()->route('tasks.index')->with('notice', trans($message));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
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
    public function store(TaskRequest $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->save();

        // return redirect()->route('tasks.index')->with('notice', trans('language.createMessage'));
        return ($this->redirectTo('language.createMessage'));
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
        //
        $task = Task::find($id);

        if ($task == null)
        {
            // return redirect()->route('tasks.index')->with('notice', trans('language.notFoundMessage'));
            return ($this->redirectTo('language.notFoundMessage'));
        }
        else
        {
            return view('update', compact('task'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        //
        $task = Task::find($id);
        $task->name = $request->name;
        $task->save();

        // return redirect()->route('tasks.index')->with('notice', trans('language.updateMessage'));
        return ($this->redirectTo('language.updateMessage'));
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
        $task = Task::find($id);
        if ($task == null)
        {
            // return redirect()->route('tasks.index')->with('notice', trans('language.notFoundMessage'));
            return ($this->redirectTo('language.notFoundMessage'));
        }
        else
        {
            $task->delete();
        }
        
        // return redirect()->route('tasks.index')->with('notice', trans('language.deleteMessage'));
        return ($this->redirectTo('language.deleteMessage'));
    }
}

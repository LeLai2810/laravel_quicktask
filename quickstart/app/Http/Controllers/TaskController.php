<?php

namespace App\Http\Controllers;

use App\Http\Requests\Checkrequest;
use App\Task;
use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at')->get();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Checkrequest $request)
    {

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }

	/**
     * Remove the specified resource from storage.
     *
     * @param  Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

       
    }
}

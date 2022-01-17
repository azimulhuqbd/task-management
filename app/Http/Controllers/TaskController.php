<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Http\Requests\TaskRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data['tasks'] = Task::where('created_by', \Auth::id())->get();
        return view('tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $data['task_status'] = TaskStatus::asSelectArray();
        $data['task_categories'] = Category::where('created_by', \Auth::id())->get();
        return view('tasks.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = new Task();
        $task->name = $request->task_name;
        $task->details = $request->task_details;
        $task->category_id = $request->task_category;
        $task->deadline = $request->task_deadline;
        $task->status = $request->task_status;
        $task->created_by = \Auth::id();

        $task->save();
        return redirect('/tasks');
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
        $task = Task::where('created_by', \Auth::id())->find($id);
        if (!$task) {
            return redirect('/tasks');
        }

        $data['task'] = $task;
        $data['task_status'] = TaskStatus::asSelectArray();
        $data['categories_list'] = Category::where('created_by', \Auth::id())->get();

        return \view('tasks.edit', $data);
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
        $task = Task::where('created_by', \Auth::id())->find($id);
        if (!$task) {
            return redirect('/tasks');
        }

        $task->name = $request->task_name;
        $task->details = $request->task_details;
        $task->category_id = $request->task_category;
        $task->deadline = $request->task_deadline;
        $task->status = $request->task_status;
        $task->created_by = \Auth::id();

        $task->save();

        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::where('created_by', \Auth::id())->find($id);
        if (!$task) {
            return redirect('/tasks');
        }

        $task->delete();

        return redirect('/tasks');
    }
}

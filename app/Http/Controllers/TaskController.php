<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct($task)
    {
        parent::__construct($task);
    }

    public function create(Request $request)
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        // Create The Task...
        $this->task = $task;
        $task->name = $request->name;
        $task->save();
    }

    /* Delete An Existing Task  */
    public function delete($id){
        Task::findOrFail($id)->delete();
    }
}

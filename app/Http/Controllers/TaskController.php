<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use http\Env\Response;
use App\Models\Task;
class TaskController extends Controller
{
    public function showTask($task_id)
    {
        $task = Task::find($task_id);
        if (is_null($task)) {
            return response()->json([
                'error' => true,
                'message' => 'Not found'
            ], 404);
        }
        return response()->json($task, 200);
    }

    public function showTasks()
    {
        return response()->json(Task::get(), 200);
    }

    public function createTask(Request $req)
    {
        $task = Task::create($req->all());
        return response()->json($task,201);
    }

    public function editTask(Request $req, $task_id)
    {
        $task = Task::find($task_id);
        if (is_null($task)) {
            return response()->json([
                'error' => true,
                'message' => 'Not found'
            ], 404);
        }
        $task->update($req->all());
        return response()->json($task,200);
    }

    public function deleteTask($task_id)
    {
        $task = Task::find($task_id);
        if (is_null($task)) {
            return response()->json([
                'error' => true,
                'message' => 'Not found'
            ], 404);
        }
        $task->delete();
        return response()->json('', 204);
    }
}

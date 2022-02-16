<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function addTodoTask(Request $request)
    {
        $newTodoTask = new Task();
        $newTodoTask->description = $request->post('description');
        $newTodoTask->checked = 0;

        $newTodoTask->save();

        return \response()->json($newTodoTask->toArray());
    }

    public function showTodoTaskList()
    {
        return \response()->json(Task::get()->toArray());
    }

    public function editTodoTaskDescription(Request $request)
    {
        $todoTask = Task::find($request->post('id'));
        $todoTask->description = $request->post('description');

        $todoTask->save();

        return \response()->json($todoTask->toArray());
    }

    public function toggleTodoTaskCheck(int $id, int $checked)
    {
        # atur agar nilai checked hanya 0/1
        if ($checked <= 0) {
            $checked = 0;
        } else {
            $checked = 1;
        }

        $todoTask = Task::find($id);
        $todoTask->checked = $checked;

        $todoTask->save();

        return \response()->json($todoTask->toArray());
    }

    public function deleteTodoTask(int $id)
    {
        Task::destroy($id);

        return \response()->json('success');
    }
}

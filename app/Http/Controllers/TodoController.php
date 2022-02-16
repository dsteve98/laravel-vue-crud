<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function addTodoTask(Request $request)
    {
        $newTodoTask = new Task();
        $newTodoTask->description = $request->post('title');
        $newTodoTask->checked = 0;

        $newTodoTask->save();

        $responseData = $newTodoTask->toArray();
        $responseData['status'] = ($responseData['checked'] == 1 ? true: false);
        $responseData['title'] = $responseData['description'];
        unset($responseData['checked']);
        unset($responseData['description']);

        return \response()->json($responseData);
    }

    public function showTodoTaskList()
    {
        $taskList = Task::get();
        $responsePayload = [];
        foreach ($taskList as $task) {
            /**
             * @var \App\Models\Task $task
             */
            unset($temp);
            $temp = $task->toArray();
            $temp['status'] = ($temp['checked'] == 1 ? true: false);
            $temp['title'] = $temp['description'];
            unset($temp['checked']);
            unset($temp['description']);
            $responsePayload[] = $temp;
        }
        return \response()->json($responsePayload);
    }

    public function editTodoTaskDescription(Request $request)
    {
        $todoTask = Task::find($request->post('id'));
        $todoTask->description = $request->post('title');

        $todoTask->save();

        $responseData = $todoTask->toArray();
        $responseData['status'] = ($responseData['checked'] == 1 ? true: false);
        $responseData['title'] = $responseData['description'];
        unset($responseData['checked']);
        unset($responseData['description']);

        return \response()->json($responseData);
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

        $responseData = $todoTask->toArray();
        $responseData['status'] = ($responseData['checked'] == 1 ? true: false);
        $responseData['title'] = $responseData['description'];
        unset($responseData['checked']);
        unset($responseData['description']);

        return \response()->json($responseData);
    }

    public function deleteTodoTask(int $id)
    {
        Task::destroy($id);

        return \response()->json('success');
    }
}

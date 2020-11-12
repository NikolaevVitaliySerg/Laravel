<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{


    public function showTodoList($list_id)
    {
        $todoList=TodoList::find($list_id);
        if ( is_null($todoList) ) {
            return response()->json(['error'=>true, 'message'=>'Not found'],404);
        }
        return response()->json(TodoList::find($list_id), 200);
    }

    public function showTodoLists()
    {
        return response()->json(TodoList::get(), 200);
    }

    public function createTodoList(Request $req)
    {
        $todoList = TodoList::create($req->all());
        return response()->json($todoList,201);
    }

    public function editTodoList(Request $req, $list_id)
    {
        $todoList=TodoList::find($list_id);
        if ( is_null($todoList) ) {
            return response()->json(['error'=>true, 'message'=>'Not found'],404);
        }
        $todoList->update($req->all());
        return response()->json($todoList,200);
    }

    public function deleteTodoList($list_id)
    {
        $todoList=TodoList::find($list_id);
        if ( is_null($todoList) ) {
            return response()->json(['error'=>true, 'message'=>'Not found'],404);
        }
        $todoList->delete();
        return response()->json('',204);
    }

    public function showTTodoList($list_id)
    {
        return response()->json(TodoList::find($list_id), 200);
    }

}

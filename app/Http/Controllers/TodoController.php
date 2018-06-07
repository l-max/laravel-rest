<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

/**
 * Class TodoController
 * Used for work with todo entity
 * @package App\Http\Controllers
 */
class TodoController extends Controller
{
    /**
     * Display a listing of the todos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = auth()->user()->todo();

        return response()->json([
            'success' => true,
            'data' => $todos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $todo = new Todo();
        $todo->description = $request->description;
        $todo->user_id = auth()->user()->id;

        if (auth()->user()->todo()->save($todo)) {
            return response()->json([
                'success' => true,
                'data' => $todo->toArray()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Todo could not be added'
            ], 500);
        }
    }

    /** Get todo by id
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $todo = auth()->user()->todo()->find($id);

        if (!$todo) {
            return response()->json([
                'success' => false,
                'message' => 'Item with id ' . (int) $id . ' not found'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $todo->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = auth()->user()->todo()->find($id);

        if (!$todo) {
            return response()->json([
                'success' => false,
                'message' => 'Item with id ' . (int) $id . ' not found'
            ], 404);
        }
        $updatedTodo = $todo->fill($request->all())->save();

        if ($updatedTodo) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Todo could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $todo = auth()->user()->todo()->find($id);

        if (!$todo) {
            return response()->json([
                'success' => false,
                'message' => 'Item with id ' . (int) $id . ' not found'
            ], 404);
        }

        if ($todo->delete()) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Todo could not be deleted'
            ], 500);
        }
    }
}

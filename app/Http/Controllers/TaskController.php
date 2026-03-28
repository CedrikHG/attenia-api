<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        $tasks = Task::where('user_id', Auth::id())->get();

        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $tasks,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Task created successfully',
            'data' => $task,
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $task = Task::where('user_id', Auth::id())->find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Task not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $task,
        ], 200);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $task = Task::where('user_id', Auth::id())->find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Task not found',
            ], 404);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|in:pending,completed',
        ]);

        $task->update($request->only(['title', 'description', 'status']));

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Task updated successfully',
            'data' => $task,
        ], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $task = Task::where('user_id', Auth::id())->find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Task not found',
            ], 404);
        }

        $task->delete();

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Task deleted successfully',
        ], 200);
    }
}
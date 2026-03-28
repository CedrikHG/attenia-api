<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index(): JsonResponse
    {
        $sessions = Session::where('user_id', Auth::id())->get();

        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $sessions,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'duration' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        $session = Session::create([
            'duration' => $request->duration,
            'date' => $request->date,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Session created successfully',
            'data' => $session,
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $session = Session::where('user_id', Auth::id())->find($id);

        if (!$session) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Session not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $session,
        ], 200);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $session = Session::where('user_id', Auth::id())->find($id);

        if (!$session) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Session not found',
            ], 404);
        }

        $request->validate([
            'duration' => 'sometimes|integer|min:1',
            'date' => 'sometimes|date',
        ]);

        $session->update($request->only(['duration', 'date']));

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Session updated successfully',
            'data' => $session,
        ], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $session = Session::where('user_id', Auth::id())->find($id);

        if (!$session) {
            return response()->json([
                'success' => false,
                'status' => 400,
                'message' => 'Session not found',
            ], 404);
        }

        $session->delete();

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Session deleted successfully',
        ], 200);
    }
}
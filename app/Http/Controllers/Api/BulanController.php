<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bulan;
use Illuminate\Http\Request;

class BulanController extends Controller
{
    public function index()
    {
        $bulan = Bulan::all();

        return response()->json([
            'status' => 'success',
            'data' => $bulan,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|date',
        ]);

        $bulan = Bulan::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Bulan created successfully',
            'data' => $bulan,
        ], 201);
    }

    public function show($id)
    {
        $bulan = Bulan::find($id);

        if (!$bulan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bulan not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $bulan,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $bulan = Bulan::find($id);

        if (!$bulan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bulan not found',
            ], 404);
        }

        $request->validate([
            'bulan' => 'required|date',
        ]);

        $bulan->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Bulan updated successfully',
            'data' => $bulan,
        ], 200);
    }

    public function destroy($id)
    {
        $bulan = Bulan::find($id);

        if (!$bulan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bulan not found',
            ], 404);
        }

        $bulan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Bulan deleted successfully',
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bulan;
use Illuminate\Support\Str;
class BulanController extends Controller
{
    //

    // Create a new record
    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|date',
            // 'program_id' => 'required|uuid',
        ]);

        $bulan = new Bulan([
            'id' => Str::uuid(),
            'bulan' => $request->bulan,
            // 'program_id' => $request->program_id,
        ]);

        $bulan->save();

        return response()->json([
            'message' => 'Bulan created successfully',
            'data' => $bulan
        ], 201);
    }

    // Read all records
    public function index()
    {
        $bulan = Bulan::all();
        return response()->json($bulan, 200);
    }

    // Read a specific record
    public function show($id)
    {
        $bulan = Bulan::find($id);

        if (!$bulan) {
            return response()->json([
                'message' => 'Bulan not found'
            ], 404);
        }

        return response()->json($bulan, 200);
    }

    // Update a record
    public function update(Request $request, $id)
    {
        $request->validate([
            'bulan' => 'required|date',
            // 'program_id' => 'required|uuid',
        ]);

        $bulan = Bulan::find($id);

        if (!$bulan) {
            return response()->json([
                'message' => 'Bulan not found'
            ], 404);
        }

        $bulan->bulan = $request->bulan;
        $bulan->program_id = $request->program_id;
        $bulan->save();

        return response()->json([
            'message' => 'Bulan updated successfully',
            'data' => $bulan
        ], 200);
    }

    // Delete a record
    public function destroy($id)
    {
        $bulan = Bulan::find($id);

        if (!$bulan) {
            return response()->json([
                'message' => 'Bulan not found'
            ], 404);
        }

        $bulan->delete();

        return response()->json([
            'message' => 'Bulan deleted successfully'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $program = Program::all();

        return response()->json([
            'status' => 'success',
            'data' => $program,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string',
            'nama_indikator' => 'required|string',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string',
            'anggaran_murni' => 'required|integer',
            'pergeseran' => 'required|integer',
            'perubahan' => 'required|integer',
            'penyerapan_anggaran' => 'required|integer',
            'persen_penyerapan_anggaran' => 'required|integer',
            'bulan_id' => 'required|uuid',
        ]);

        $program = Program::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Program created successfully',
            'data' => $program,
        ], 201);
    }

    public function show($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'status' => 'error',
                'message' => 'Program not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $program,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'status' => 'error',
                'message' => 'Program not found',
            ], 404);
        }

        $request->validate([
            'nama_program' => 'required|string',
            'nama_indikator' => 'required|string',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string',
            'anggaran_murni' => 'required|integer',
            'pergeseran' => 'required|integer',
            'perubahan' => 'required|integer',
            'penyerapan_anggaran' => 'required|integer',
            'persen_penyerapan_anggaran' => 'required|integer',
            'bulan_id' => 'required|uuid',
        ]);

        $program->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Program updated successfully',
            'data' => $program,
        ], 200);
    }

    public function destroy($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'status' => 'error',
                'message' => 'Program not found',
            ], 404);
        }

        $program->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Program deleted successfully',
        ], 200);
    }
}

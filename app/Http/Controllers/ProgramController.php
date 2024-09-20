<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Str;
class ProgramController extends Controller
{
    //

    // Create a new record
    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'required|integer',
            'pergeseran' => 'required|integer',
            'perubahan' => 'required|integer',
            'penyerapan_anggaran' => 'required|integer',
            'persen_penyerapan_anggaran' => 'required|integer',
            'kegiatan_id' => 'required|uuid',
            'bulan_id' => 'required|uuid',
        ]);

        $program = new Program([
            'id' => Str::uuid(),
            'nama_program' => $request->nama_program,
            'nama_indikator' => $request->nama_indikator,
            'jumlah_indikator' => $request->jumlah_indikator,
            'tipe_indikator' => $request->tipe_indikator,
            'anggaran_murni' => $request->anggaran_murni,
            'pergeseran' => $request->pergeseran,
            'perubahan' => $request->perubahan,
            'penyerapan_anggaran' => $request->penyerapan_anggaran,
            'persen_penyerapan_anggaran' => $request->persen_penyerapan_anggaran,
            'kegiatan_id' => $request->kegiatan_id,
            'bulan_id' => $request->bulan_id,
        ]);

        $program->save();

        return response()->json([
            'message' => 'Program created successfully',
            'data' => $program
        ], 201);
    }

    // Read all records
    public function index()
    {
        $programs = Program::all();
        return response()->json($programs, 200);
    }

    // Read a specific record
    public function show($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'message' => 'Program not found'
            ], 404);
        }

        return response()->json($program, 200);
    }

    // Update a record
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'required|integer',
            'pergeseran' => 'required|integer',
            'perubahan' => 'required|integer',
            'penyerapan_anggaran' => 'required|integer',
            'persen_penyerapan_anggaran' => 'required|integer',
            'kegiatan_id' => 'required|uuid',
            'bulan_id' => 'required|uuid',
        ]);

        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'message' => 'Program not found'
            ], 404);
        }

        $program->nama_program = $request->nama_program;
        $program->nama_indikator = $request->nama_indikator;
        $program->jumlah_indikator = $request->jumlah_indikator;
        $program->tipe_indikator = $request->tipe_indikator;
        $program->anggaran_murni = $request->anggaran_murni;
        $program->pergeseran = $request->pergeseran;
        $program->perubahan = $request->perubahan;
        $program->penyerapan_anggaran = $request->penyerapan_anggaran;
        $program->persen_penyerapan_anggaran = $request->persen_penyerapan_anggaran;
        $program->kegiatan_id = $request->kegiatan_id;
        $program->bulan_id = $request->bulan_id;
        $program->save();

        return response()->json([
            'message' => 'Program updated successfully',
            'data' => $program
        ], 200);
    }

    // Delete a record
    public function destroy($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'message' => 'Program not found'
            ], 404);
        }

        $program->delete();

        return response()->json([
            'message' => 'Program deleted successfully'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();

        return response()->json([
            'status' => 'success',
            'data' => $kegiatan,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string',
            'nama_indikator' => 'required|string',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string',
            'anggaran_murni' => 'required|integer',
            'pergeseran' => 'required|integer',
            'perubahan' => 'required|integer',
            'penyerapan_anggaran' => 'required|integer',
            'persen_penyerapan_anggaran' => 'required|integer',
            'program_id' => 'required|uuid',
        ]);

        $kegiatan = Kegiatan::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Kegiatan created successfully',
            'data' => $kegiatan,
        ], 201);
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kegiatan not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $kegiatan,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kegiatan not found',
            ], 404);
        }

        $request->validate([
            'nama_kegiatan' => 'required|string',
            'nama_indikator' => 'required|string',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string',
            'anggaran_murni' => 'required|integer',
            'pergeseran' => 'required|integer',
            'perubahan' => 'required|integer',
            'penyerapan_anggaran' => 'required|integer',
            'persen_penyerapan_anggaran' => 'required|integer',
            'program_id' => 'required|uuid',
        ]);

        $kegiatan->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Kegiatan updated successfully',
            'data' => $kegiatan,
        ], 200);
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kegiatan not found',
            ], 404);
        }

        $kegiatan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Kegiatan deleted successfully',
        ], 200);
    }
}

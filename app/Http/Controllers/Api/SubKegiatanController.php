<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;

class SubKegiatanController extends Controller
{
    public function index()
    {
        $sub_kegiatan = SubKegiatan::all();

        return response()->json([
            'status' => 'success',
            'data' => $sub_kegiatan,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sub_kegiatan' => 'required|string',
            'nama_indikator' => 'required|string',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string',
            'anggaran_murni' => 'required|integer',
            'pergeseran' => 'required|integer',
            'perubahan' => 'required|integer',
            'penyerapan_anggaran' => 'required|integer',
            'persen_penyerapan_anggaran' => 'required|integer',
            'kegiatan_id' => 'required|uuid',
        ]);

        $sub_kegiatan = SubKegiatan::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Sub Kegiatan created successfully',
            'data' => $sub_kegiatan,
        ], 201);
    }

    public function show($id)
    {
        $sub_kegiatan = SubKegiatan::find($id);

        if (!$sub_kegiatan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sub Kegiatan not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $sub_kegiatan,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $sub_kegiatan = SubKegiatan::find($id);

        if (!$sub_kegiatan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sub Kegiatan not found',
            ], 404);
        }

        $request->validate([
            'nama_sub_kegiatan' => 'required|string',
            'nama_indikator' => 'required|string',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string',
            'anggaran_murni' => 'required|integer',
            'pergeseran' => 'required|integer',
            'perubahan' => 'required|integer',
            'penyerapan_anggaran' => 'required|integer',
            'persen_penyerapan_anggaran' => 'required|integer',
            'kegiatan_id' => 'required|uuid',
        ]);

        $sub_kegiatan->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Sub Kegiatan updated successfully',
            'data' => $sub_kegiatan,
        ], 200);
    }

    public function destroy($id)
    {
        $sub_kegiatan = SubKegiatan::find($id);

        if (!$sub_kegiatan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sub Kegiatan not found',
            ], 404);
        }

        $sub_kegiatan->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Sub Kegiatan deleted successfully',
        ], 200);
    }
}

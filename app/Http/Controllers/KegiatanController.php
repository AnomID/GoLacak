<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Str;
class KegiatanController extends Controller
{
    //

    // Create a new record
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'required|integer',
            'pergeseran' => 'required|integer',
            'perubahan' => 'required|integer',
            'penyerapan_anggaran' => 'required|integer',
            'persen_penyerapan_anggaran' => 'required|integer',
            'sub_kegiatan_id' => 'required|uuid',
        ]);

        $kegiatan = new Kegiatan([
            'id' => Str::uuid(),
            'nama_kegiatan' => $request->nama_kegiatan,
            'nama_indikator' => $request->nama_indikator,
            'jumlah_indikator' => $request->jumlah_indikator,
            'tipe_indikator' => $request->tipe_indikator,
            'anggaran_murni' => $request->anggaran_murni,
            'pergeseran' => $request->pergeseran,
            'perubahan' => $request->perubahan,
            'penyerapan_anggaran' => $request->penyerapan_anggaran,
            'persen_penyerapan_anggaran' => $request->persen_penyerapan_anggaran,
            'sub_kegiatan_id' => $request->sub_kegiatan_id,
        ]);

        $kegiatan->save();

        return response()->json([
            'message' => 'Kegiatan created successfully',
            'data' => $kegiatan
        ], 201);
    }

    // Read all records
    public function index()
    {
        $kegiatans = Kegiatan::all();
        return response()->json($kegiatans, 200);
    }

    // Read a specific record
    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return response()->json([
                'message' => 'Kegiatan not found'
            ], 404);
        }

        return response()->json($kegiatan, 200);
    }

    // Update a record
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'required|integer',
            'pergeseran' => 'required|integer',
            'perubahan' => 'required|integer',
            'penyerapan_anggaran' => 'required|integer',
            'persen_penyerapan_anggaran' => 'required|integer',
            'sub_kegiatan_id' => 'required|uuid',
        ]);

        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return response()->json([
                'message' => 'Kegiatan not found'
            ], 404);
        }

        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->nama_indikator = $request->nama_indikator;
        $kegiatan->jumlah_indikator = $request->jumlah_indikator;
        $kegiatan->tipe_indikator = $request->tipe_indikator;
        $kegiatan->anggaran_murni = $request->anggaran_murni;
        $kegiatan->pergeseran = $request->pergeseran;
        $kegiatan->perubahan = $request->perubahan;
        $kegiatan->penyerapan_anggaran = $request->penyerapan_anggaran;
        $kegiatan->persen_penyerapan_anggaran = $request->persen_penyerapan_anggaran;
        $kegiatan->sub_kegiatan_id = $request->sub_kegiatan_id;
        $kegiatan->save();

        return response()->json([
            'message' => 'Kegiatan updated successfully',
            'data' => $kegiatan
        ], 200);
    }

    // Delete a record
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return response()->json([
                'message' => 'Kegiatan not found'
            ], 404);
        }

        $kegiatan->delete();

        return response()->json([
            'message' => 'Kegiatan deleted successfully'
        ], 200);
    }
}

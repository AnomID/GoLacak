<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SubKegiatan;
class SubKegiatanController extends Controller
{
    //

    // Create a new record
    public function store(Request $request)
    {
        $request->validate([
            'nama_sub_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'required|integer',
            'pergeseran' => 'required|integer',
            'perubahan' => 'required|integer',
            'penyerapan_anggaran' => 'required|integer',
            'persen_penyerapan_anggaran' => 'required|integer',
        ]);

        $subKegiatan = new SubKegiatan([
            'id' => Str::uuid(),
            'nama_sub_kegiatan' => $request->nama_sub_kegiatan,
            'nama_indikator' => $request->nama_indikator,
            'jumlah_indikator' => $request->jumlah_indikator,
            'tipe_indikator' => $request->tipe_indikator,
            'anggaran_murni' => $request->anggaran_murni,
            'pergeseran' => $request->pergeseran,
            'perubahan' => $request->perubahan,
            'penyerapan_anggaran' => $request->penyerapan_anggaran,
            'persen_penyerapan_anggaran' => $request->persen_penyerapan_anggaran,
        ]);

        $subKegiatan->save();

        return response()->json([
            'message' => 'SubKegiatan created successfully',
            'data' => $subKegiatan
        ], 201);
    }

    // Read all records
    public function index()
    {
        $subKegiatans = SubKegiatan::all();
        return response()->json($subKegiatans, 200);
    }

    // Read a specific record
    public function show($id)
    {
        $subKegiatan = SubKegiatan::find($id);

        if (!$subKegiatan) {
            return response()->json([
                'message' => 'SubKegiatan not found'
            ], 404);
        }

        return response()->json($subKegiatan, 200);
    }

    // Update a record
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sub_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'required|integer',
            'pergeseran' => 'required|integer',
            'perubahan' => 'required|integer',
            'penyerapan_anggaran' => 'required|integer',
            'persen_penyerapan_anggaran' => 'required|integer',
        ]);

        $subKegiatan = SubKegiatan::find($id);

        if (!$subKegiatan) {
            return response()->json([
                'message' => 'SubKegiatan not found'
            ], 404);
        }

        $subKegiatan->nama_sub_kegiatan = $request->nama_sub_kegiatan;
        $subKegiatan->nama_indikator = $request->nama_indikator;
        $subKegiatan->jumlah_indikator = $request->jumlah_indikator;
        $subKegiatan->tipe_indikator = $request->tipe_indikator;
        $subKegiatan->anggaran_murni = $request->anggaran_murni;
        $subKegiatan->pergeseran = $request->pergeseran;
        $subKegiatan->perubahan = $request->perubahan;
        $subKegiatan->penyerapan_anggaran = $request->penyerapan_anggaran;
        $subKegiatan->persen_penyerapan_anggaran = $request->persen_penyerapan_anggaran;
        $subKegiatan->save();

        return response()->json([
            'message' => 'SubKegiatan updated successfully',
            'data' => $subKegiatan
        ], 200);
    }

    // Delete a record
    public function destroy($id)
    {
        $subKegiatan = SubKegiatan::find($id);

        if (!$subKegiatan) {
            return response()->json([
                'message' => 'SubKegiatan not found'
            ], 404);
        }

        $subKegiatan->delete();

        return response()->json([
            'message' => 'SubKegiatan deleted successfully'
        ], 200);
    }
}

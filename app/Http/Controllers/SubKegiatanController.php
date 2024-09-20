<?php

namespace App\Http\Controllers;

use App\Models\SubKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubKegiatanController extends Controller
{
    public function index($kegiatanId)
    {
        $kegiatan = Kegiatan::find($kegiatanId);
        $subKegiatan = SubKegiatan::where('kegiatan_id', $kegiatanId)->get();

        return Inertia::render('SubKegiatan/Index', [
            'subKegiatan' => $subKegiatan,
            'kegiatan' => $kegiatan,
        ]);
    }

    public function create($kegiatanId)
    {
        $kegiatan = Kegiatan::find($kegiatanId);
        return Inertia::render('SubKegiatan/Create', [
            'kegiatan' => $kegiatan,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sub_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'required|numeric',
            'pergeseran' => 'required|numeric',
            'perubahan' => 'required|numeric',
            'penyerapan_anggaran' => 'required|numeric',
            'persen_penyerapan_anggaran' => 'required|numeric',
            'kegiatan_id' => 'required|exists:kegiatan,id',
        ]);

        SubKegiatan::create($request->all());

        return redirect()->route('subkegiatan.index', $request->kegiatan_id)
                         ->with('success', 'Sub Kegiatan created successfully.');
    }

    public function edit(SubKegiatan $subkegiatan)
    {
        return Inertia::render('SubKegiatan/Edit', [
            'subkegiatan' => $subkegiatan,
        ]);
    }

    public function update(Request $request, SubKegiatan $subkegiatan)
    {
        $request->validate([
            'nama_sub_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'required|numeric',
            'pergeseran' => 'required|numeric',
            'perubahan' => 'required|numeric',
            'penyerapan_anggaran' => 'required|numeric',
            'persen_penyerapan_anggaran' => 'required|numeric',
            'kegiatan_id' => 'required|exists:kegiatan,id',
        ]);

        $subkegiatan->update($request->all());

        return redirect()->route('subkegiatan.index', $subkegiatan->kegiatan_id)
                         ->with('success', 'Sub Kegiatan updated successfully.');
    }

    public function destroy(SubKegiatan $subkegiatan)
    {
        $subkegiatan->delete();
        return redirect()->route('subkegiatan.index', $subkegiatan->kegiatan_id)
                         ->with('success', 'Sub Kegiatan deleted successfully.');
    }
}

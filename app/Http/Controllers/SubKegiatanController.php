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
        'anggaran_murni' => 'nullable|numeric',
        'pergeseran' => 'nullable|numeric',
        'perubahan' => 'nullable|numeric',
        'penyerapan_anggaran' => 'nullable|numeric',
        'persen_penyerapan_anggaran' => 'nullable|numeric',
        'kegiatan_id' => 'required|exists:kegiatan,id',
    ]);

    // Set default value to 0 if fields are not filled
    $data = $request->all();
    $data['anggaran_murni'] = $data['anggaran_murni'] ?? 0;
    $data['pergeseran'] = $data['pergeseran'] ?? 0;
    $data['perubahan'] = $data['perubahan'] ?? 0;
    $data['penyerapan_anggaran'] = $data['penyerapan_anggaran'] ?? 0;
    $data['persen_penyerapan_anggaran'] = $data['persen_penyerapan_anggaran'] ?? 0;

    SubKegiatan::create($data);

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
        'anggaran_murni' => 'nullable|numeric',
        'pergeseran' => 'nullable|numeric',
        'perubahan' => 'nullable|numeric',
        'penyerapan_anggaran' => 'nullable|numeric',
        'persen_penyerapan_anggaran' => 'nullable|numeric',
        'kegiatan_id' => 'required|exists:kegiatan,id',
    ]);

    $data = $request->all();
    $data['anggaran_murni'] = $data['anggaran_murni'] ?? 0;
    $data['pergeseran'] = $data['pergeseran'] ?? 0;
    $data['perubahan'] = $data['perubahan'] ?? 0;
    $data['penyerapan_anggaran'] = $data['penyerapan_anggaran'] ?? 0;
    $data['persen_penyerapan_anggaran'] = $data['persen_penyerapan_anggaran'] ?? 0;

    $subkegiatan->update($data);

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

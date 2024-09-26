<?php

namespace App\Http\Controllers;

use App\Models\SubKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubKegiatanController extends Controller
{
    // Menampilkan daftar sub-kegiatan berdasarkan kegiatan
    public function index(Kegiatan $kegiatan)
    {
        $subKegiatan = SubKegiatan::where('kegiatan_id', $kegiatan->id)
                    ->orderBy('created_at', 'asc')
                    ->get();

        return Inertia::render('SubKegiatan/Index', [
            'subKegiatan' => $subKegiatan,
            'kegiatan' => $kegiatan,
        ]);
    }

    // Metode khusus untuk user
    public function userSubKegiatanIndex(Kegiatan $kegiatan)
    {
        $subKegiatan = SubKegiatan::where('kegiatan_id', $kegiatan->id)
                    ->orderBy('created_at', 'asc')
                    ->get();

        return Inertia::render('User/SubKegiatan/Index', [
            'subKegiatan' => $subKegiatan,
            'kegiatan' => $kegiatan,
        ]);
    }

    public function create(Kegiatan $kegiatan)
    {
        return Inertia::render('SubKegiatan/Create', ['kegiatan' => $kegiatan]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sub_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'nullable|numeric',
            'kegiatan_id' => 'required|exists:kegiatan,id',
        ]);

        SubKegiatan::create($request->all());

        return redirect()->route('subkegiatan.index', $request->kegiatan_id)->with('success', 'Sub Kegiatan berhasil dibuat.');
    }

    // public function edit(SubKegiatan $subKegiatan)
    // {
    //     return Inertia::render('SubKegiatan/Edit', ['subkegiatan' => $subKegiatan]);
    // }
    // Metode untuk menampilkan form edit sub-kegiatan
    public function edit(SubKegiatan $subKegiatan)
    {
        return Inertia::render('SubKegiatan/Edit', [
            'subKegiatan' => $subKegiatan,
        ]);
    }

    // Metode untuk user mengedit anggaran sub-kegiatan
    public function editAnggaran(SubKegiatan $subKegiatan)
    {
        return Inertia::render('User/SubKegiatan/EditAnggaran', [
            'subKegiatan' => $subKegiatan,
        ]);
    }

    // Metode untuk user mengupdate anggaran sub-kegiatan
    public function updateAnggaran(Request $request, SubKegiatan $subKegiatan)
    {
        $request->validate([
            'anggaran_murni' => 'nullable|numeric',
            'pergeseran' => 'nullable|numeric',
            'perubahan' => 'nullable|numeric',
            'penyerapan_anggaran' => 'nullable|numeric',
            'persen_penyerapan_anggaran' => 'nullable|numeric',
        ]);

        $subKegiatan->update($request->only([
            'anggaran_murni',
            'pergeseran',
            'perubahan',
            'penyerapan_anggaran',
            'persen_penyerapan_anggaran',
        ]));

        return redirect()->route('user.subkegiatan.index', $subKegiatan->kegiatan_id)->with('success', 'Anggaran sub-kegiatan berhasil diperbarui.');
    }

    public function update(Request $request, SubKegiatan $subKegiatan)
    {
        $request->validate([
            'nama_sub_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'nullable|numeric',
        ]);

        $subKegiatan->update($request->all());

        return redirect()->route('subkegiatan.index', $subKegiatan->kegiatan_id)->with('success', 'Sub Kegiatan berhasil diperbarui.');
    }

    public function destroy(SubKegiatan $subKegiatan)
    {
        $subKegiatan->delete();

        return redirect()->route('subkegiatan.index', $subKegiatan->kegiatan_id)->with('success', 'Sub Kegiatan berhasil dihapus.');
    }
}

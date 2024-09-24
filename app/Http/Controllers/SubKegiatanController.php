<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\SubKegiatan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubKegiatanController extends Controller
{
    // Menampilkan daftar Sub Kegiatan berdasarkan Kegiatan
    public function index(Kegiatan $kegiatan)
    {
        // Urutkan sub kegiatan berdasarkan 'created_at' secara ascending agar data terbaru ada di paling bawah
        $subkegiatan = SubKegiatan::where('kegiatan_id', $kegiatan->id)
                        ->orderBy('created_at', 'asc')
                        ->get();

        return Inertia::render('SubKegiatan/Index', [
            'subkegiatan' => $subkegiatan,
            'kegiatan' => $kegiatan,
        ]);
    }

    // Form untuk menambahkan Sub Kegiatan baru
    public function create(Kegiatan $kegiatan)
    {
        return Inertia::render('SubKegiatan/Create', [
            'kegiatan' => $kegiatan,
        ]);
    }

    // Menyimpan Sub Kegiatan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_subkegiatan' => 'required|string|max:255',
            'jumlah_subindikator' => 'required|integer',
            'tipe_subindikator' => 'required|string|max:255',
            'anggaran_subkegiatan' => 'nullable|numeric',
            'kegiatan_id' => 'required|exists:kegiatan,id',
        ]);

        SubKegiatan::create($request->all());

        return redirect()->route('subkegiatan.index', $request->kegiatan_id)->with('success', 'Sub Kegiatan created successfully.');
    }

    // Form edit Sub Kegiatan
    public function edit(SubKegiatan $subkegiatan)
    {
        return Inertia::render('SubKegiatan/Edit', [
            'subkegiatan' => $subkegiatan,
        ]);
    }

    // Mengupdate Sub Kegiatan
    public function update(Request $request, SubKegiatan $subkegiatan)
    {
        $request->validate([
            'nama_subkegiatan' => 'required|string|max:255',
            'jumlah_subindikator' => 'required|integer',
            'tipe_subindikator' => 'required|string|max:255',
            'anggaran_subkegiatan' => 'nullable|numeric',
            'kegiatan_id' => 'required|exists:kegiatan,id',
        ]);

        $subkegiatan->update($request->all());

        return redirect()->route('subkegiatan.index', $subkegiatan->kegiatan_id)->with('success', 'Sub Kegiatan updated successfully.');
    }

    // Menghapus Sub Kegiatan
    public function destroy(SubKegiatan $subkegiatan)
    {
        $subkegiatan->delete();

        return redirect()->route('subkegiatan.index', $subkegiatan->kegiatan_id)->with('success', 'Sub Kegiatan deleted successfully.');
    }
}

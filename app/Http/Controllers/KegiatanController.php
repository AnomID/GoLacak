<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Program;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KegiatanController extends Controller
{
    // Menampilkan daftar kegiatan berdasarkan program
    public function index(Program $program)
    {
        $kegiatan = Kegiatan::where('program_id', $program->id)
                    ->orderBy('created_at', 'asc')
                    ->get();

        return Inertia::render('Kegiatan/Index', [
            'kegiatan' => $kegiatan,
            'program' => $program,
        ]);
    }

    // Metode khusus untuk user
    public function userKegiatanIndex(Program $program)
    {
        $kegiatan = Kegiatan::where('program_id', $program->id)
                    ->orderBy('created_at', 'asc')
                    ->get();

        return Inertia::render('User/Kegiatan/Index', [
            'kegiatan' => $kegiatan,
            'program' => $program,
        ]);
    }

    public function create(Program $program)
    {
        return Inertia::render('Kegiatan/Create', ['program' => $program]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'nullable|numeric',
            'program_id' => 'required|exists:program,id',
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('kegiatan.index', $request->program_id)->with('success', 'Kegiatan berhasil dibuat.');
    }

     // Metode untuk user mengedit anggaran kegiatan
    public function editAnggaran(Kegiatan $kegiatan)
    {
        return Inertia::render('User/Kegiatan/EditAnggaran', [
            'kegiatan' => $kegiatan,
        ]);
    }

    // Metode untuk user mengupdate anggaran kegiatan
    public function updateAnggaran(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'anggaran_murni' => 'nullable|numeric',
            'pergeseran' => 'nullable|numeric',
            'perubahan' => 'nullable|numeric',
            'penyerapan_anggaran' => 'nullable|numeric',
            'persen_penyerapan_anggaran' => 'nullable|numeric',
        ]);

        $kegiatan->update($request->only([
            'anggaran_murni',
            'pergeseran',
            'perubahan',
            'penyerapan_anggaran',
            'persen_penyerapan_anggaran',
        ]));

        return redirect()->route('user.kegiatan.index', $kegiatan->program_id)->with('success', 'Anggaran berhasil diperbarui.');
    }

    // public function edit(Kegiatan $kegiatan)
    // {
    //     return Inertia::render('Kegiatan/Edit', ['kegiatan' => $kegiatan]);
    // }

        public function edit(Kegiatan $kegiatan)
    {
        return Inertia::render('Kegiatan/Edit', [
            'kegiatan' => $kegiatan,
        ]);
    }
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'nullable|numeric',
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index', $kegiatan->program_id)->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        return redirect()->route('kegiatan.index', $kegiatan->program_id)->with('success', 'Kegiatan berhasil dihapus.');
    }
}

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
    // Urutkan kegiatan berdasarkan 'created_at' secara ascending agar data terbaru ada di paling bawah
    $kegiatan = Kegiatan::where('program_id', $program->id)
                ->orderBy('created_at', 'asc')  // Gunakan 'asc' untuk menempatkan yang baru di bawah
                ->get();
    
    return Inertia::render('Kegiatan/Index', [
        'kegiatan' => $kegiatan,
        'program' => $program,
    ]);
}


    // Form untuk menambahkan kegiatan baru
    public function create(Program $program)
    {
        return Inertia::render('Kegiatan/Create', [
            'program' => $program,
        ]);
    }

    // Menyimpan kegiatan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'nullable|numeric',
            'pergeseran' => 'nullable|numeric',
            'perubahan' => 'nullable|numeric',
            'penyerapan_anggaran' => 'nullable|numeric',
            'persen_penyerapan_anggaran' => 'nullable|numeric',
            'program_id' => 'required|exists:program,id',
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('kegiatan.index', $request->program_id)->with('success', 'Kegiatan created successfully.');
    }

    // Form edit kegiatan
    public function edit(Kegiatan $kegiatan)
    {
        return Inertia::render('Kegiatan/Edit', [
            'kegiatan' => $kegiatan,
        ]);
    }

    // Mengupdate kegiatan
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'nullable|numeric',
            'pergeseran' => 'nullable|numeric',
            'perubahan' => 'nullable|numeric',
            'penyerapan_anggaran' => 'nullable|numeric',
            'persen_penyerapan_anggaran' => 'nullable|numeric',
            'program_id' => 'required|exists:program,id',
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index', $kegiatan->program_id)->with('success', 'Kegiatan updated successfully.');
    }

    // Menghapus kegiatan
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        return redirect()->route('kegiatan.index', $kegiatan->program_id)->with('success', 'Kegiatan deleted successfully.');
    }

    // User mengupdate anggaran kegiatan
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
            'persen_penyerapan_anggaran'
        ]));

        return redirect()->route('user.kegiatan.index', $kegiatan->program_id)->with('success', 'Anggaran updated successfully.');
    }
}

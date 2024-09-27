<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Bulan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProgramController extends Controller
{
    // Menampilkan daftar program berdasarkan bulan
    public function index(Bulan $bulan)
    {
        $programs = Program::where('bulan_id', $bulan->id)
                    ->orderBy('created_at', 'asc')
                    ->get();

        return Inertia::render('Program/Index', [
            'programs' => $programs,
            'bulan' => $bulan,
        ]);
    }

    // Metode khusus untuk user
    public function userProgramIndex(Bulan $bulan)
    {
        $programs = Program::where('bulan_id', $bulan->id)
                    ->orderBy('created_at', 'asc')
                    ->get();

        return Inertia::render('User/Program/Index', [
            'programs' => $programs,
            'bulan' => $bulan,
        ]);
    }

    public function create(Bulan $bulan)
    {
        return Inertia::render('Program/Create', ['bulan' => $bulan]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'nullable|numeric',
            'bulan_id' => 'required|exists:bulan,id',
        ]);

        // Pastikan semua anggaran memiliki nilai default 0 jika null
        $data = $request->all();
        $data['anggaran_murni'] = $data['anggaran_murni'] ?? 0;
        $data['pergeseran'] = $data['pergeseran'] ?? 0;
        $data['perubahan'] = $data['perubahan'] ?? 0;
        $data['penyerapan_anggaran'] = $data['penyerapan_anggaran'] ?? 0;
        $data['persen_penyerapan_anggaran'] = $data['persen_penyerapan_anggaran'] ?? 0;

        Program::create($data);
        
        return redirect()->route('program.index', $request->bulan_id)->with('success', 'Program berhasil dibuat.');
    }

    public function edit(Program $program)
    {
        return Inertia::render('Program/Edit', ['program' => $program]);
    }
  // Metode untuk user mengedit anggaran program
    public function editAnggaran(Program $program)
    {
        return Inertia::render('User/Program/EditAnggaran', [
            'program' => $program,
        ]);
    }

    // Metode untuk user mengupdate anggaran program
    public function updateAnggaran(Request $request, Program $program)
    {
        $request->validate([
            'anggaran_murni' => 'nullable|numeric',
            'pergeseran' => 'nullable|numeric',
            'perubahan' => 'nullable|numeric',
            'penyerapan_anggaran' => 'nullable|numeric',
            'persen_penyerapan_anggaran' => 'nullable|numeric',
        ]);

        $program->update($request->only([
            'anggaran_murni',
            'pergeseran',
            'perubahan',
            'penyerapan_anggaran',
            'persen_penyerapan_anggaran',
        ]));

        return redirect()->route('user.program.index', $program->bulan_id)->with('success', 'Anggaran berhasil diperbarui.');
    }
 public function update(Request $request, Program $program)
    {
        // Validasi input dari request
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'nullable|numeric',
            'pergeseran' => 'nullable|numeric',
            'perubahan' => 'nullable|numeric',
            'penyerapan_anggaran' => 'nullable|numeric',
            'persen_penyerapan_anggaran' => 'nullable|numeric',
            'bulan_id' => 'required|exists:bulan,id',
        ]);

        // Update program berdasarkan input dari request
        $program->update($request->only([
            'nama_program',
            'nama_indikator',
            'jumlah_indikator',
            'tipe_indikator',
            'anggaran_murni',
            'pergeseran',
            'perubahan',
            'penyerapan_anggaran',
            'persen_penyerapan_anggaran',
            'bulan_id'
        ]));

        // Redirect ke halaman daftar program
        return redirect()->route('program.index', $program->bulan_id)->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('program.index', $program->bulan_id)->with('success', 'Program berhasil dihapus.');
    }
}

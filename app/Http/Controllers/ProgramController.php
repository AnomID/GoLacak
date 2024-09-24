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
    // Urutkan program berdasarkan 'created_at' secara ascending agar data terbaru ada di paling bawah
    $programs = Program::where('bulan_id', $bulan->id)
                ->orderBy('created_at', 'asc')  // Gunakan 'asc' untuk menempatkan yang baru di bawah
                ->get();
    
    return Inertia::render('Program/Index', [
        'programs' => $programs,
        'bulan' => $bulan,
    ]);
}

    // User melihat program di dalam bulan
    public function userProgramIndex(Bulan $bulan)
    {
        $programs = Program::where('bulan_id', $bulan->id)->get();
        return Inertia::render('User/Program/Index', [
            'programs' => $programs,
            'bulan' => $bulan,
        ]);
    }

    // Form untuk menambahkan program baru
    public function create(Bulan $bulan)
    {
        return Inertia::render('Program/Create', [
            'bulan' => $bulan,
        ]);
    }

    // Menyimpan data program baru
    public function store(Request $request)
    {
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

        Program::create($request->all());

        return redirect()->route('program.index', $request->bulan_id)->with('success', 'Program created successfully.');
    }

    // Form edit program
    public function edit(Program $program)
    {
        return Inertia::render('Program/Edit', [
            'program' => $program,
        ]);
    }

    // Update program
    public function update(Request $request, Program $program)
    {
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

        $program->update($request->all());

        return redirect()->route('program.index', $program->bulan_id)->with('success', 'Program updated successfully.');
    }

    // Menghapus program
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('program.index', $program->bulan_id)->with('success', 'Program deleted successfully.');
    }

    // User mengupdate anggaran program
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
            'persen_penyerapan_anggaran'
        ]));

        return redirect()->route('user.program.index', $program->bulan_id)->with('success', 'Anggaran updated successfully.');
    }
}

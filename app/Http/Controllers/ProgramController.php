<?php
namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Bulan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProgramController extends Controller
{
    public function index(Bulan $bulan)
    {
        $programs = Program::where('bulan_id', $bulan->id)->get();
        return Inertia::render('Program/Index', [
            'programs' => $programs,
            'bulan' => $bulan,
        ]);
    }

    public function create(Bulan $bulan)
    {
        return Inertia::render('Program/Create', [
            'bulan' => $bulan,
        ]);
    }

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

    // Set default value to 0 if fields are not filled
    $data = $request->all();
    $data['anggaran_murni'] = $data['anggaran_murni'] ?? 0;
    $data['pergeseran'] = $data['pergeseran'] ?? 0;
    $data['perubahan'] = $data['perubahan'] ?? 0;
    $data['penyerapan_anggaran'] = $data['penyerapan_anggaran'] ?? 0;
    $data['persen_penyerapan_anggaran'] = $data['persen_penyerapan_anggaran'] ?? 0;

    Program::create($data);

    return redirect()->route('program.index', $request->bulan_id)
                     ->with('success', 'Program created successfully.');
}

    public function edit(Program $program)
    {
        return Inertia::render('Program/Edit', [
            'program' => $program,
        ]);
    }

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

    $data = $request->all();
    $data['anggaran_murni'] = $data['anggaran_murni'] ?? 0;
    $data['pergeseran'] = $data['pergeseran'] ?? 0;
    $data['perubahan'] = $data['perubahan'] ?? 0;
    $data['penyerapan_anggaran'] = $data['penyerapan_anggaran'] ?? 0;
    $data['persen_penyerapan_anggaran'] = $data['persen_penyerapan_anggaran'] ?? 0;

    $program->update($data);

    return redirect()->route('program.index', $program->bulan_id)
                     ->with('success', 'Program updated successfully.');
}
    
    public function destroy(Program $program)
    {
    $program->delete();

    return redirect()->route('program.index', $program->bulan_id)
                     ->with('success', 'Program deleted successfully.');
    }

}

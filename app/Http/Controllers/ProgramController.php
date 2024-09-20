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
            'anggaran_murni' => 'required|numeric',
            'pergeseran' => 'required|numeric',
            'perubahan' => 'required|numeric',
            'penyerapan_anggaran' => 'required|numeric',
            'persen_penyerapan_anggaran' => 'required|numeric',
            'bulan_id' => 'required|exists:bulan,id',
        ]);

        Program::create($request->all());

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
            'anggaran_murni' => 'required|numeric',
            'pergeseran' => 'required|numeric',
            'perubahan' => 'required|numeric',
            'penyerapan_anggaran' => 'required|numeric',
            'persen_penyerapan_anggaran' => 'required|numeric',
            'bulan_id' => 'required|exists:bulan,id',
        ]);

        $program->update($request->all());

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

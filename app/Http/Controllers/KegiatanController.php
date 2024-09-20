<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Program;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KegiatanController extends Controller
{
    public function index($programId)
    {
        $program = Program::find($programId);
        $kegiatan = Kegiatan::where('program_id', $programId)->get();

        return Inertia::render('Kegiatan/Index', [
            'kegiatan' => $kegiatan,
            'program' => $program,
        ]);
    }

    public function create($programId)
    {
        $program = Program::find($programId);
        return Inertia::render('Kegiatan/Create', [
            'program' => $program,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'nama_indikator' => 'required|string|max:255',
            'jumlah_indikator' => 'required|integer',
            'tipe_indikator' => 'required|string|max:255',
            'anggaran_murni' => 'required|numeric',
            'pergeseran' => 'required|numeric',
            'perubahan' => 'required|numeric',
            'penyerapan_anggaran' => 'required|numeric',
            'persen_penyerapan_anggaran' => 'required|numeric',
            'program_id' => 'required|exists:program,id',
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('kegiatan.index', $request->program_id)
                         ->with('success', 'Kegiatan created successfully.');
    }

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
            'anggaran_murni' => 'required|numeric',
            'pergeseran' => 'required|numeric',
            'perubahan' => 'required|numeric',
            'penyerapan_anggaran' => 'required|numeric',
            'persen_penyerapan_anggaran' => 'required|numeric',
            'program_id' => 'required|exists:program,id',
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index', $kegiatan->program_id)
                         ->with('success', 'Kegiatan updated successfully.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('kegiatan.index', $kegiatan->program_id)
                         ->with('success', 'Kegiatan deleted successfully.');
    }
}

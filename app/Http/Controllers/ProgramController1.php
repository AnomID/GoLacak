<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Bulan;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::with('bulan')->get();
        return view('program.index', compact('programs'));
    }

    public function create()
    {
        $bulans = Bulan::all();
        return view('program.create', compact('bulans'));
    }

    public function store(Request $request)
    {
        Program::create($request->all());
        return redirect()->route('program.index')->with('success', 'Program berhasil ditambahkan!');
    }

    public function show(Program $program)
    {
        return view('program.show', compact('program'));
    }

    public function edit(Program $program)
    {
        $bulans = Bulan::all();
        return view('program.edit', compact('program', 'bulans'));
    }

    public function update(Request $request, Program $program)
    {
        $program->update($request->all());
        return redirect()->route('program.index')->with('success', 'Program berhasil diperbarui!');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('program.index')->with('success', 'Program berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BulanController extends Controller
{
    public function index()
    {
        $bulan = Bulan::all();
        return Inertia::render('Bulan/Index', ['bulan' => $bulan]);
    }

    public function create()
    {
        return Inertia::render('Bulan/Create');
    }
    
    public function store(Request $request)
    {
    $request->validate([
        'bulan' => 'required|string|max:255',  // Pastikan kolom bulan berupa string
    ]);

    Bulan::create($request->only('bulan'));

    return redirect()->route('bulan.index')->with('success', 'Bulan created successfully.');
}

    public function edit(Bulan $bulan)
    {
        return Inertia::render('Bulan/Edit', ['bulan' => $bulan]);
    }
    
    public function update(Request $request, Bulan $bulan)
    {
    $request->validate([
        'bulan' => 'required|string|max:255',  // Validasi string
    ]);

    $bulan->update($request->only('bulan'));

    return redirect()->route('bulan.index')->with('success', 'Bulan updated successfully.');
}

    public function destroy(Bulan $bulan)
    {
        $bulan->delete();
        return redirect()->route('bulan.index')->with('success', 'Bulan deleted successfully.');
    }
}

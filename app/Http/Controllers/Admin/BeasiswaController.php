<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beasiswa;

class BeasiswaController extends Controller
{
    public function index()
    {
        $beasiswas = Beasiswa::all();
        return view('content.admin.beasiswas.index', compact('beasiswas'));
    }

    public function create()
    {
        return view('content.admin.beasiswas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        Beasiswa::create($validated);

        return redirect()->route('admin.beasiswas.index')->with('success', 'Beasiswa berhasil ditambahkan.');
    }

 
    public function edit($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        return view('content.admin.beasiswas.edit', compact('beasiswa'));
    }

 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->update($request->all());

        return redirect()->route('admin.beasiswas.index')->with('success', 'Data beasiswa berhasil diperbarui.');
    }

 
    public function destroy($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->delete();

        return redirect()->route('admin.beasiswas.index')->with('success', 'Data beasiswa berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beasiswa;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function create($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $kriterias = Kriteria::where('beasiswa_id', $id)->get();
        return view('content.admin.kriteria.form', compact('beasiswa', 'kriterias'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'kriteria.*.nama_kriteria' => 'required|string|max:255',
            'kriteria.*.bobot' => 'required|numeric|min:0',
            'kriteria.*.atribut' => 'required|in:benefit,cost',
        ]);

        foreach ($request->kriteria as $item) {
            Kriteria::create([
                'beasiswa_id' => $id,
                'nama_kriteria' => $item['nama_kriteria'],
                'bobot' => $item['bobot'],
                'atribut' => $item['atribut'],
            ]);
        }

        return redirect()->route('admin.kriteria.create', $id)->with('success', 'Kriteria berhasil disimpan.');
    }
}


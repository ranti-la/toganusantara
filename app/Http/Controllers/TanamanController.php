<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TanamanController extends Controller
{
    public function index()
    {
        $tanamen = Tanaman::all();
        return view('admin.tanaman.index', compact('tanamen'));
    }

    public function create()
    {
        return view('admin.tanaman.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'manfaat' => 'required',
            'asal_daerah' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('tanaman', 'public');
        }

        Tanaman::create($validated);
        return redirect()->route('tanaman.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(Tanaman $tanaman)
    {
        return view('admin.tanaman.edit', compact('tanaman'));
    }

    public function update(Request $request, Tanaman $tanaman)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'manfaat' => 'required',
            'asal_daerah' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            if ($tanaman->foto) {
                Storage::disk('public')->delete($tanaman->foto);
            }
            $validated['foto'] = $request->file('foto')->store('tanaman', 'public');
        }

        $tanaman->update($validated);
        return redirect()->route('tanaman.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Tanaman $tanaman)
    {
        if ($tanaman->foto) {
            Storage::disk('public')->delete($tanaman->foto);
        }
        $tanaman->delete();
        return redirect()->route('tanaman.index')->with('success', 'Data berhasil dihapus.');
    }
}
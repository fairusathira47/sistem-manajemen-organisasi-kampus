<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

use App\Http\Requests\AnggotaRequest;

class AnggotaController extends Controller
{
    public function index()
    {
        $data = Anggota::all();
        return view('anggota.index', compact('data'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(AnggotaRequest $request)
    {
        Anggota::create($request->validated());
        return redirect('/anggota')->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Anggota::findOrFail($id);
        return view('anggota.edit', compact('data'));
    }

    public function update(AnggotaRequest $request, $id)
    {
        Anggota::findOrFail($id)->update($request->validated());
        return redirect('/anggota')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        
        // Memeriksa otorisasi menggunakan Policy
        \Illuminate\Support\Facades\Gate::authorize('delete', $anggota);

        $anggota->delete();
        return redirect('/anggota')->with('success', 'Data anggota berhasil dihapus.');
    }
}
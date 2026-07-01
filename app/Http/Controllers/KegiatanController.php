<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

use App\Http\Requests\KegiatanRequest;

class KegiatanController extends Controller
{
    public function index()
    {
        $data = Kegiatan::all();
        return view('kegiatan.index', compact('data'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(KegiatanRequest $request)
    {
        Kegiatan::create($request->validated());
        return redirect('/kegiatan')->with('success', 'Data kegiatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('data'));
    }

    public function update(KegiatanRequest $request, $id)
    {
        Kegiatan::findOrFail($id)->update($request->validated());
        return redirect('/kegiatan')->with('success', 'Data kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        
        // Memeriksa otorisasi menggunakan Policy
        \Illuminate\Support\Facades\Gate::authorize('delete', $kegiatan);

        $kegiatan->delete();
        return redirect('/kegiatan')->with('success', 'Data kegiatan berhasil dihapus.');
    }
}
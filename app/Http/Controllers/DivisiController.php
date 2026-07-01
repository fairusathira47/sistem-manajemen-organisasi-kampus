<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

use App\Http\Requests\DivisiRequest;

class DivisiController extends Controller
{
    public function index()
    {
        $data = Divisi::all();
        return view('divisi.index', compact('data'));
    }

    public function create()
    {
        return view('divisi.create');
    }

    public function store(DivisiRequest $request)
    {
        Divisi::create($request->validated());
        return redirect('/divisi')->with('success', 'Data divisi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Divisi::findOrFail($id);
        return view('divisi.edit', compact('data'));
    }

    public function update(DivisiRequest $request, $id)
    {
        Divisi::findOrFail($id)->update($request->validated());
        return redirect('/divisi')->with('success', 'Data divisi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $divisi = Divisi::findOrFail($id);
        
        // Memeriksa otorisasi menggunakan Policy
        \Illuminate\Support\Facades\Gate::authorize('delete', $divisi);

        $divisi->delete();
        return redirect('/divisi')->with('success', 'Data divisi berhasil dihapus.');
    }
}
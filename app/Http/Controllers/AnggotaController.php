<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        Anggota::create($request->all());
        return redirect('/anggota');
    }

    public function edit($id)
    {
        $data = Anggota::find($id);
        return view('anggota.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Anggota::find($id)->update($request->all());
        return redirect('/anggota');
    }

    public function destroy($id)
    {
        Anggota::find($id)->delete();
        return redirect('/anggota');
    }
}
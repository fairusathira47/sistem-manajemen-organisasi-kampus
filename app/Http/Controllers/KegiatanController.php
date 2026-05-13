<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        Kegiatan::create($request->all());
        return redirect('/kegiatan');
    }

    public function edit($id)
    {
        $data = Kegiatan::find($id);
        return view('kegiatan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Kegiatan::find($id)->update($request->all());
        return redirect('/kegiatan');
    }

    public function destroy($id)
    {
        Kegiatan::find($id)->delete();
        return redirect('/kegiatan');
    }
}
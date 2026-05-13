<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        Divisi::create($request->all());
        return redirect('/divisi');
    }

    public function edit($id)
    {
        $data = Divisi::find($id);
        return view('divisi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Divisi::find($id)->update($request->all());
        return redirect('/divisi');
    }

    public function destroy($id)
    {
        Divisi::find($id)->delete();
        return redirect('/divisi');
    }
}
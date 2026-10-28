<?php
namespace App\Http\Controllers;

use App\Models\Perlengkapan;
use Illuminate\Http\Request;

class PerlengkapanController extends Controller
{
    public function index()
    {
        $data = Perlengkapan::all();
        return view('perlengkapan.index', compact('data'));
    }

    public function create()
    {
        return view('perlengkapan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'kondisi' => 'required',
            'tarif' => 'required|numeric'
        ]);

        Perlengkapan::create($request->all());
        return redirect()->route('perlengkapan.index');
    }

    public function edit(Perlengkapan $perlengkapan)
    {
        return view('perlengkapan.edit', compact('perlengkapan'));
    }

    public function update(Request $request, Perlengkapan $perlengkapan)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'kondisi' => 'required',
            'tarif' => 'required|numeric'
        ]);

        $perlengkapan->update($request->all());
        return redirect()->route('perlengkapan.index');
    }

    public function destroy(Perlengkapan $perlengkapan)
    {
        $perlengkapan->delete();
        return redirect()->route('perlengkapan.index');
    }
}

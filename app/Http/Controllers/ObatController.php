<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index(){
        $obats = Obat::all();
        return view('admin.obat.index', compact('obats'));
    }

    public function create(){
        return view('admin.obat.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama_obat' => 'required|string',
            'kemasan' => 'required|string',
            'harga' => 'required|integer',
        ]);

        Obat::create([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga
        ]);

        return redirect()->route('obat.index')
            ->with('message','Data Obat Berhasil dibuat')
            ->with('type','success');
    }

    public function edit(string $id){
        $obat = Obat::findOrFail($id);
        // return view('admin.obat.edit', compact('obat'));
        return view('admin.obat.edit')->with([
            'obat'=> $obat
        ]);
        // sama saja seperti compact('obat') -> bedanya bisa ubah nama key
    }

    public function update(Request $request, string $id){
        $request->validate([
            'nama_obat' => 'required|string',
            'kemasan' => 'nullable|string',
            'harga' => 'required|integer',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga
        ]);

        return redirect()->route('obat.index')
            ->with('message','Data Obat berhasil di edit')
            ->with('type', 'success');
    }

    public function destroy(string $id){
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('obat.index')
            ->with('message','Data Obat berhasil di Hapus')
            ->with('type','success');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Inventarisir;
use App\Models\User;
use Illuminate\Http\Request;

class InventarisirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Inventarisir::orderBy('created_at', 'DESC')->get();
        $title = 'data barang';
        return view("dashboard.databarang", compact('barang','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $idPetugas = User::pluck('id')->first(); // Misalnya, ambil id_petugas pertama dari tabel users

        // return view('dashboard.databarang', compact('idPetugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // @dd($request->all());
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'kondisi' => 'required',
            'keterangan' => 'nullable',
            'jumlah' => 'required|integer|min:1',
            'jenis' => 'required',
            'id_ruang' => 'required',
            'kode_barang' => 'required|unique:inventarisirs',
            'tanggal_register' => 'required'
        ]);
        $validateData = Inventarisir::create($validateData);
        return redirect()->route('databarang.index')->with('sukses','Data barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventarisir $id)
    {
        $barang = Inventarisir::find($id);
        $title = 'detail barang';
        return view('dashboard.barang.edit', compact('barang','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventarisir $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventarisir $inventarisir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventarisir $inventarisir)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Inventarisir;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Minjem;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventarisir = Inventarisir::orderBy('created_at', 'DESC')->get();
        $title = 'peminjaman';
        return view("dashboard.peminjaman.index", compact('title','inventarisir'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'id_peminjaman' => 'required|unique:peminjamans',
            'jumlah' => 'required',
            'pesan' => 'required',
            'tanggal' => 'required',
            'barang' => 'required'
        ]);
        $validateData =  Peminjaman::create($validateData);
        return redirect()->route('peminjaman.index')->with('sukses','berhasil meminjam');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

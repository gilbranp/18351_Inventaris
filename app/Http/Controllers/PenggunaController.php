<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Policies\LevelPolicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Monolog\Level;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // if (!auth()->check() || (auth()->user()->level !== 'administrator' && auth()->user()->level !== 'operator')) {
        //     abort(403, 'Halaman tidak ditemukan');
        if (!auth()->check() || (auth()->user()->level !== 'administrator')) {
            abort(403, 'Halaman tidak ditemukan');
        }
        
        // if (Auth::user()->level !== 'administrator'){
        //     abort(403);
        // }

        $user = User::orderBy('created_at', 'DESC')->get();
        $title = 'data pengguna';
        return view("dashboard.datapengguna", compact('user','title'));
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
            'name' => 'required|max:255',
            'username' => ['required','min:3','max:255','unique:users'],
            'email' => 'required|email:dns|unique:users',
            'alamat' => 'required|min:10|max:255',
            'level' => 'required|in:administrator,operator,kepalagudang',
            'password' => 'required|min:5|max:255',
            // 'hakakses' => 'required|in:superadmin,admin,editor' // Tambahkan validasi untuk hakakses
           ]);
    
        //    $validateData['password'] = bcrypt($validateData['password']);
           $validateData['password'] = Hash::make($validateData['password']);
           User::create($validateData);
        //   $request->session()->flash('sukses', 'Registrasi berhasil! Silahkan login');
           return redirect('/datauser')->with('sukses', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $title = 'data pengguna';
        return view('dashboard.pengguna.detail', compact('user','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $title = 'data pengguna';
        return view('dashboard.pengguna.edit', compact('user','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect()->route('datauser.index')->with('sukses', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete(); // Menghapus entitas dari database
        return redirect()->route('datauser.index')->with('sukses', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Manajemen User';
        $user = User::all();
        return view('user.index', compact('title','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah user';
        $departemen = Departemen::all();
        return view('user.create', compact('title','departemen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:dns|unique:users,email',
            'telepon' => 'required|numeric|unique:users,telepon',
            'departemen_id' => 'required|numeric',
            'role' => 'required|in:admin,kadep,user',
            'password' => 'required|min:6',
            'jabatan' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'departemen_id' => $request->departemen_id,
            'jabatan' => $request->jabatan,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil disimpan.',
            'type' => 'success'    
        ]);
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
        $title = 'Data user';
        $user = User::findOrFail(decrypt($id));
        $departemen = Departemen::all();
        return view('user.edit', compact('user','title','departemen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail(decrypt($id));
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:dns|unique:users,email,'. $user->id,
            'telepon' => 'required|numeric|unique:users,telepon,'. $user->id,
            'departemen_id' => 'required|numeric',
            'jabatan' => 'required',
            'role' => 'required|in:admin,kadep,user',
            'password' => 'nullable|min:6',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'departemen_id' => $request->departemen_id,
            'jabatan' => $request->jabatan,
            'role' => $request->role,
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('user.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil diperbarui.',
            'type' => 'success'    
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail(decrypt($id));
        $user->delete();

        return redirect()->route('user.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil dihapus.',
            'type' => 'success'    
        ]);
    }
}

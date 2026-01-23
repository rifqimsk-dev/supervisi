<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $title = 'Data Departemen';
        $departemen = Departemen::all();
        return view('departemen.index', compact('title','departemen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Departemen::create($request->all());

        return redirect()->route('departemen.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil disimpan.',
            'type' => 'success'    
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $departemen = Departemen::findOrFail($id);
        $request->validate([
            'name' => 'required',
        ]);

        $departemen->update($request->all());

        return redirect()->route('departemen.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil diperbarui.',
            'type' => 'success'    
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $departemen = Departemen::findOrFail($id);
        $departemen->delete();

        return redirect()->route('departemen.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil dihapus.',
            'type' => 'success'
        ]);
    }
}

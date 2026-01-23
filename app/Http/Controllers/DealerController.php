<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Dealer';
        $dealer = Dealer::select('id','dealer_code','dealer_name')->orderBy('dealer_name', 'asc')->get();
        return view('dealer.index', compact('title','dealer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dealer_code' => 'required',
            'dealer_name' => 'required',
        ]);

        Dealer::create($request->all());

        return redirect()->route('dealer.index')->with('alert', [
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
        $dealer = Dealer::findOrFail($id);
        $request->validate([
            'dealer_code' => 'required',
            'dealer_name' => 'required',
        ]);

        $dealer->update($request->all());

        return redirect()->route('dealer.index')->with('alert', [
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
        $dealer = Dealer::findOrFail($id);
        $dealer->delete();

        return redirect()->route('dealer.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil dihapus.',
            'type' => 'success'
        ]);
    }
}

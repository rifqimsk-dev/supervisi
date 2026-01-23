<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dealer;
use App\Models\Temuan;
use App\Models\Kunjungan;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Kunjungan';
        if (Auth::user()->role == "user") {
            $result = Kunjungan::with('dealer','inventaris')->where('user_id', auth()->id())->get();
        } elseif (Auth::user()->role == "kadep") {
            $result = Kunjungan::with('dealer','inventaris')->where('departemen_id', Auth::user()->departemen_id)->get();
        }
        return view('kunjungan.index', compact('title','result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Buat Kunjungan Baru';
        $mst_dealer = Dealer::select('id','dealer_name')->get();
        $mst_inventaris = Inventaris::select('id','name')->get();
        return view('kunjungan.create', compact('title','mst_dealer','mst_inventaris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal'       => 'required|date',
            'dealer_id'     => 'required|numeric',
            'tujuan'        => 'required',
            'alamat'        => 'required',
            'latitude'      => 'required',
            'longitude'     => 'required',
            'inventaris_id' => 'required|numeric',
        ]);

        Kunjungan::create([
            'user_id'       => auth()->id(),
            'tanggal'       => $validate['tanggal'],
            'dealer_id'     => $validate['dealer_id'],
            'tujuan'        => $validate['tujuan'],
            'alamat'        => $validate['alamat'],
            'latitude'      => $validate['latitude'],
            'longitude'     => $validate['longitude'],
            'inventaris_id' => $validate['inventaris_id'],
        ]);

        return redirect()->route('kunjungan.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil disimpan.',
            'type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = 'Data Kunjungan';
        $encrypt_id = decrypt($id);
        $kunjungan = Kunjungan::with('user','dealer','inventaris')->findOrFail($encrypt_id);
        $temuan = Temuan::where('kunjungan_id', $kunjungan->id)->first();

        return view('kunjungan.show', compact('title','kunjungan','temuan'));
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

    public function approve(Request $request, $id)
    {
        $encrypt_id = decrypt($id);
        $kunjungan = Kunjungan::findOrFail($encrypt_id);

        $validate = $request->validate([
            'catatan_status' => 'nullable'
        ]);

        $kunjungan->update([
            'status'            => 'approved',
            'catatan_status'    => $validate['catatan_status']
        ]);

        return redirect()->back()->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Berhasil di approve.',
            'type' => 'success'
        ]);
    }

    public function download($id)
    {
        $kunjungan = Kunjungan::with(['user','dealer','inventaris'])
        ->findOrFail(decrypt($id));
        $kadep = User::select('name')->where('role','kadep')->where('departemen_id', Auth::user()->departemen_id)->first();

        $pdf = Pdf::loadView('kunjungan.surat_kunjungan', compact('kunjungan','kadep'))
              ->setPaper('A4', 'portrait');

        return $pdf->download('surat-kunjungan.pdf');
    }
}

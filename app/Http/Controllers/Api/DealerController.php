<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dealer;

class DealerController extends Controller
{
    // GET /api/dealer
    public function index()
    {
        $dealer = Dealer::all();

        return response()->json([
            'success' => true,
            'message' => 'Data dealer berhasil diambil',
            'data' => $dealer
        ], 200);
    }

    // GET /api/dealer/{id}
    public function show($id)
    {
        $dealer = Dealer::find($id);

        if (!$dealer) {
            return response()->json([
                'success' => false,
                'message' => 'Dealer tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $dealer
        ], 200);
    }
}

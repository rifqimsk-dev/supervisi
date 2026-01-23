<?php

namespace App\Http\Controllers;

use App\Models\Temuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemuanController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kunjungan_id'   => 'required|numeric',
            'people'         => 'required|string',
            'premises'       => 'required|string',
            'process'        => 'required|string',
            'file_people'    => 'nullable|file|mimes:pdf,jpg,png',
            'file_premises'  => 'nullable|file|mimes:pdf,jpg,png',
            'file_process'   => 'nullable|file|mimes:pdf,jpg,png',
        ]);

        $temuan = Temuan::where('kunjungan_id', $validated['kunjungan_id'])->first();

        // FILE PEOPLE
        if ($request->hasFile('file_people')) {
            if ($temuan && $temuan->file_people) {
                Storage::disk('public')->delete($temuan->file_people);
            }

            $validated['file_people'] =
                $request->file('file_people')->store('temuan/people', 'public');
        }

        // FILE PREMISES
        if ($request->hasFile('file_premises')) {
            if ($temuan && $temuan->file_premises) {
                Storage::disk('public')->delete($temuan->file_premises);
            }

            $validated['file_premises'] =
                $request->file('file_premises')->store('temuan/premises', 'public');
        }

        // FILE PROCESS
        if ($request->hasFile('file_process')) {
            if ($temuan && $temuan->file_process) {
                Storage::disk('public')->delete($temuan->file_process);
            }

            $validated['file_process'] =
                $request->file('file_process')->store('temuan/process', 'public');
        }

        Temuan::updateOrCreate(
            ['kunjungan_id' => $validated['kunjungan_id']],
            [
                'user_id'       => auth()->id(),
                'people'        => $validated['people'],
                'premises'      => $validated['premises'],
                'process'       => $validated['process'],
                'file_people'   => $validated['file_people']   ?? $temuan->file_people ?? null,
                'file_premises' => $validated['file_premises'] ?? $temuan->file_premises ?? null,
                'file_process'  => $validated['file_process']  ?? $temuan->file_process ?? null,
            ]
        );

        return back()->with('success', 'Temuan berhasil disimpan');
    }

}

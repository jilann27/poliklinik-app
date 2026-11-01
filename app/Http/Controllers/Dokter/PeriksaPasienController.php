<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriksaPasienController extends Controller
{
    public function index()
    {
        $dokterId = Auth::id();

        $daftarPasien = DaftarPoli::with(['pasien', 'jadwalPeriksa', 'periksas'])
            ->whereHas('jadwalPeriksa', function ($query) use ($dokterId) {
                $query->where('id_dokter', $dokterId);
            })
            ->orderBy('no_antrian')
            ->get();

        return view('dokter.periksa-pasien.index', compact('daftarPasien'));
    }

    public function create($id)
    {
        $daftarPoli = DaftarPoli::with('pasien')->findOrFail($id);
        $obats = Obat::all();

        return view('dokter.periksa-pasien.create', compact('obats', 'daftarPoli'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_daftar_poli' => 'required|exists:daftar_poli,id',
            'obat'           => 'required|array|min:1',
            'obat.*'         => 'exists:obat,id',
            'catatan'        => 'nullable|string',
        ]);

        $totalObat = Obat::whereIn('id', $request->obat)->sum('harga');

        $periksa = Periksa::create([
            'id_daftar_poli' => $request->id_daftar_poli,
            'tgl_periksa'    => now(),
            'catatan'        => $request->catatan,
            'biaya_periksa'  => $totalObat + 150000,
        ]);

        foreach ($request->obat as $idObat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat'    => $idObat,
            ]);
        }

        return redirect()
            ->route('periksa-pasien.index')
            ->with('success', 'Data periksa berhasil disimpan.');
    }
}
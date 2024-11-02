<?php

namespace App\Http\Controllers;

use App\Models\JadwalRuangan;
use App\Models\Pemetaan;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class JadwalRuanganController extends Controller
{

    public function index()
{
    $datas = JadwalRuangan::with(['ruangan', 'pemetaan'])->get();
    $pemetaan = Pemetaan::all();
    $ruangan = Ruangan::all();
    return view('jadwal_ruangan.index', compact('datas', 'ruangan', 'pemetaan'));
}

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([

            'jam_masuk' => 'required|time',
            'jam_keluar' => 'required|time',
            'hari' => 'required',
        ]);

        JadwalRuangan::create($validated);

        return redirect()->route('jadwal_ruangan.index')->with('success', 'Data created successfully!');
    }

public function update(Request $request, string $id)
{

    $datas = JadwalRuangan::findOrFail($id);

    $request->validate([
            'jam_masuk' => 'required|time',
            'jam_keluar' => 'required|time',
            'hari' => 'required',

    ]);

    $datas->update($request->all());
    return redirect(route('jadwal_ruangan.index'))->with('success', 'Data Pemetaan berhasil diperbarui.');
}


public function delete(JadwalRuangan $datas)
{

    return view('jadwal_ruangan.hapus', compact('datas'));
}
public function destroy($id){
    $datas = JadwalRuangan::findorfail($id);
    $datas->delete();
    return redirect('/jadwal_ruangan')->with('success', 'Berhasil Dihapus');
}
}

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
    $datas = JadwalRuangan::with(['ruangan', 'pemetaan.mata_kuliah', 'pemetaan.dosen'])->get();
    $pemetaan = Pemetaan::with(['mata_kuliah', 'dosen'])->get();

    // dd($pemetaan);

    $ruangan = Ruangan::all();
    return view('jadwal_ruangan.index', compact('datas', 'pemetaan', 'ruangan'));
}

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([

            'pemetaan_id' => 'required|exists:pemetaans,id',
            'ruangan_id' => 'required|exists:ruangans,id',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
            'hari' => 'required',
        ]);

        JadwalRuangan::create($validated);

        return redirect()->route('jadwal_ruangan.index')->with('success', 'Data created successfully!');
    }

public function update(Request $request, string $id)
{

    $datas = JadwalRuangan::findOrFail($id);

    $request->validate([
            'pemetaan_id' => 'required|exists:pemetaans,id',
            'ruangan_id' => 'required|exists:ruangans,id',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
            'hari' => 'required',
    ]);

    $datas->update($request->all());
    return redirect(route('jadwal_ruangan.index'))->with('success', 'Data JadwalRuangan berhasil diperbarui.');
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
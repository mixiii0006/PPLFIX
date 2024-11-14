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
    $jadwal = JadwalRuangan::all();

    $ruangan = Ruangan::all();
    return view('jadwal_ruangan.index', compact('datas','jadwal', 'pemetaan', 'ruangan'));
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

public function show($day)
{
    // Ambil data jadwal berdasarkan hari
    $datas = JadwalRuangan::where('hari', $day)->get();
    $pemetaan = Pemetaan::with(['mata_kuliah', 'dosen'])->get();


    $ruangan = Ruangan::all();

    // Tampilkan view dengan data jadwal yang sesuai
    return view('jadwal_ruangan.index', compact('datas', 'day','pemetaan', 'ruangan'));
}
public function filterJadwal(Request $request)
{
    // Ambil ID ruangan yang dipilih dari request
    $selectedRuanganIds = $request->input('ruangan_ids', []);
    
    // Ambil hari yang dipilih dari request
    $selectedDay = $request->input('hari', null);
    
    // Mulai query untuk mengambil data jadwal
    $query = JadwalRuangan::query();
    
    // Filter berdasarkan ID ruangan yang dipilih jika ada
    if (!empty($selectedRuanganIds)) {
        $query->whereIn('ruangan_id', $selectedRuanganIds);
    }

    // Filter berdasarkan hari yang dipilih jika ada
    if ($selectedDay) {
        $query->where('hari', $selectedDay);
    }

    // Ambil data jadwal yang sudah difilter
    $datas = $query->get();
    
    // Ambil daftar ruangan untuk form filter
    $ruangan = Ruangan::all();
    
    // Ambil daftar hari yang tersedia (untuk filter hari)
    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
   
    // Ambil data pemetaan untuk mata kuliah dan dosen
    $pemetaan = Pemetaan::with(['mata_kuliah', 'dosen'])->get();

    // Kembalikan view dengan data jadwal yang sudah difilter
    return view('jadwal_ruangan.index', compact('ruangan', 'datas', 'pemetaan', 'days'));
}


}

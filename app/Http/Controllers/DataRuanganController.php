<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class DataRuanganController extends Controller
{
    public function index()
    {
        $datas = Ruangan::all();
        return view('data_Ruangan.index', compact('datas'));
    }

    public function create()
    {
        return view('data_Ruangan.create'); // Menampilkan form untuk tabel Ruangan
    }


    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([

            'NIP' => 'required|unique:Ruangans,NIP',
            'Nama' => 'required|string|max:100'

        ]);

        Ruangan::create($validated);

        // Redirect ke halaman index
        return redirect()->route('data_Ruangan.index')->with('success', 'Data created successfully!');
    }

    public function edit($id)
    {
        $datas = Ruangan::findOrFail($id);
        return view('data_Ruangan.index', compact('datas'));
    }

    public function update(Request $request, string $id)
    {

        $Ruangan = Ruangan::findOrFail($id);

        $request->validate([
            'NIP' => 'required|unique:Ruangans,NIP,' . $Ruangan->id,
            'Nama' => 'required|string|max:100'
        ]);

        $Ruangan->update($request->all());
        return redirect(route('data_Ruangan.index'))->with('success', 'Data Ruangan berhasil diperbarui.');
    }


    public function delete(Ruangan $datas)
    {

        return view('data_Ruangan.hapus', compact('datas'));
    }
    public function destroy($id){
        $datas = Ruangan::findorfail($id);
        $datas->delete();
        return redirect('/data_Ruangan')->with('success', 'Berhasil Dihapus');
    }
    public function show($id)
    {
        $Ruangan = Ruangan::findOrFail($id);
        return view('Ruangan.show', compact('Ruangan'));
    }

}







// 'NIP' => 'required|unique:Ruangans,NIP',
// 'NIDN' => 'required|integer|unique:Ruangans,NIDN',
// 'Nama' => 'required|string|max:100',
// 'TTL' => 'nullable|string|max:100', // Date format bisa ditambahkan sesuai kebutuhan
// 'CPNS' => 'nullable|string|max:100', // Bisa gunakan date_format jika format spesifik
// 'Gol_Akhir' => 'nullable|string|max:50',
// 'Pendidikan_Akhir' => 'nullable|string|max:50',
// 'Jabfung_Akhir' => 'nullable|string|max:50',
// 'Homebase_PDDIKTI' => 'nullable|string|max:100'

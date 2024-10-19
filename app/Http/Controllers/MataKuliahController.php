<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $datas = MataKuliah::all();
        return view('data_mk.index', compact('datas'));
    }

    public function create()
    {
        return view('create'); // Menampilkan form untuk tabel dosen
    }
    // app/Http/Controllers/ExampleController.php

    public function store(Request $request, string $id)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,user,writer',

        ]);

        // Menyimpan data ke dalam database
        MataKuliah::create($validated);

        // Redirect ke halaman index
        return redirect()->route('index')->with('success', 'Data created successfully!');
    }

    public function edit($id)
    {
        $datas = MataKuliah::find($id);
        return view('data_diri.edit', compact('datas'));
    }
    public function update(Request $request, string $id)
    {
        // $data_for_update = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'email'=>'required|string|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,user,writer',

        ]);
        $datas = MataKuliah::find($id);
        $datas->update($request->all());
        return redirect(route('data_diri.index'))->with('success', 'Berhasil Dihapus');
    }

    public function delete(MataKuliah $datas)
    {

        return view('data_diri.hapus', compact('datas'));
    }
    public function destroy($id){
        $datas = MataKuliah::findorfail($id);
        $datas->delete();
        return redirect('/data_diri')->with('success', 'Berhasil Dihapus');
    }
}


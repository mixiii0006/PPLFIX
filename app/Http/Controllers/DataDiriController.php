<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataDiriController extends Controller
{
    public function index()
    {
        $datas = User::all();
        return view('data-diri.index', compact('datas'));
    }

    public function edit(User $datas)
    {

        return view('data-diri.edit', compact('datas'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,user,writer|default:user',

        ]);
        $datas = User::find($id);
        $datas->update($request->all());
        return redirect('data-diri.index')->with('success', 'Berhasil Diupdate');
    }
}


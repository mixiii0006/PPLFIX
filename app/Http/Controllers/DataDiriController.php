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

    
}


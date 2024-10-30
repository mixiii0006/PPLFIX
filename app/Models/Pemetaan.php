<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemetaan extends Model
{
     use HasFactory;

    // Define the relationship with Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    // Define the relationship with MataKuliah
    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'matakuliah_id');
    }
}

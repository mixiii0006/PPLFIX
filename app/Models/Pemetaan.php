<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemetaan extends Model
{
    protected $table = 'pemetaans';

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'dosen_id',
        'matakuliah_id',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    // Relasi ke model Dosen
    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class);
    }

    // Relasi ke model MataKuliah
    public function matakuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class JadwalRuangan extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'jam_masuk',
        'jam_keluar',
        'hari'
    ];
    protected $table = 'jadwal_ruangans';

    public function pemetaan(): BelongsTo
    {
        return $this->belongsTo(Pemetaan::class);
    }

    public function ruangan(): BelongsTo
    {
        return $this->belongsTo(Ruangan::class);
    }
}

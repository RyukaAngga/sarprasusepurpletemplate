<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'id_user',
        'id_sarana',
        'tanggal_pengaduan',
        'deskripsi',
        'status',
        'keterangan_perbaikan',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'id_user',
            'id'
        );
    }

    public function sarana()
    {
        return $this->belongsTo(
            SaranaPrasarana::class,
            'id_sarana',
            'id_sarana'
        );
    }
}

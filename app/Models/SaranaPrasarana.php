<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaranaPrasarana extends Model
{
    protected $table = 'sarana_prasarana';

    protected $primaryKey = 'id_sarana';

    protected $fillable = [
        'nama_sarana',
        'lokasi',
        'kondisi',
        'keterangan',
    ];

    public function pengaduan()
    {
        return $this->hasMany(
            Pengaduan::class,
            'id_sarana',
            'id_sarana'
        );
    }
}

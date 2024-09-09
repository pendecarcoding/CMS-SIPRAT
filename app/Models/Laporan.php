<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'id_koperasi',
        'tanggal',
        'file',
    ];

    /**
     * Get the koperasi that owns the laporan.
     */
    public function koperasi()
    {
        return $this->belongsTo(Koperasi::class, 'id_koperasi');
    }
}

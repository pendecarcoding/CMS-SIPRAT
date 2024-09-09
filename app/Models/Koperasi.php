<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koperasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_koperasi',
        'alamat',
        'desa_id',
        'user_id'
    ];

    /**
     * Get the desa that this koperasi belongs to.
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    /**
     * Get the user that manages this koperasi.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

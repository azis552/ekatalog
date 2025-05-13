<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'name',
        'kategori',
        'harga',
        'berat',
        'deskripsi',
        'stok',
        'foto',
        'user_id',
        'status',
        'dokumen'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function berkas()
    {
        return $this->belongsTo(BerkasPenjual::class,'user_id','user_id');
    }
}

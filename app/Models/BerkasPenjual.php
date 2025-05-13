<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BerkasPenjual extends Model
{
    protected $fillable = ['name','file','user_id','status','keterangan','tipe','alamat','foto'];

    public function produk()
    {
        return $this->hasMany(Produk::class,'user_id','user_id');
    }
}

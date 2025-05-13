<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstansiPemerintah extends Model
{
    protected $fillable = ['name','alamat','user_id','status'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

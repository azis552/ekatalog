<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        "instansi_id",
        "tanggal",
        "status",
        "bukti_pembayaran",
        "bukkti_penerimaan",
        "total",
    ];
}

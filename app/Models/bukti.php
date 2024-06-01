<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukti extends Model
{
    use HasFactory;
    protected $fillable = ['id_transaksi', 'gambar', 'keterangan'];
    protected $table = 'bukti';
    public $timestamps = false;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}

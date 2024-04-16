<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_transaksi',
        'name',
        'date',
        'pickup_address',
        'destination_address',
        'barang',
        'jenis',
        'truk',
        'weight',
        'phone',
        'total',
        'tracking'
    ];
    protected $table = 'transaksi';
    public $timestamps = false;
}

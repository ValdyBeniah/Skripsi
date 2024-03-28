<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'date', 'pickup_address', 'destination_address', 'barang', 'jenis', 'truk', 'weight', 'phone', 'total', 'tracking'];
    protected $table = 'transaksi';
    public $timestamps = false;

    // public function Customer()
    // {
    //     return $this->belongsTo(Customer::class, 'name', 'id');
    // }
}

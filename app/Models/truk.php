<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class truk extends Model
{
    use HasFactory;
    protected $fillable = ['truk', 'jumlah', 'harga'];
    protected $table = 'truk';
    public $timestamps = false;
}

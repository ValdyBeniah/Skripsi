<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supir extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'nomor', 'plat', 'jenis', 'tahun'];
    protected $table = 'supir';
    public $timestamps = false;
}

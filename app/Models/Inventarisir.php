<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventarisir extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kondisi',
        'keterangan',
        'jumlah',
        'jenis',
        'kondisi',
        'kode_barang',
        'id_ruang',
        'tanggal_register'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelpengeluaran extends Model
{
    protected $table = 'outcomes';
    protected $primarykey = 'id';
    protected $fillable = ['nominal','jenis_pengeluaran','keterangan','tanggal'];
    public $timestamps = false;
}

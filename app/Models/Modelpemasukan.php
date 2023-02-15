<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelpemasukan extends Model
{
    protected $table = 'incomes';
    protected $primarykey = 'id';
    protected $fillable = ['nominal','jenis_pemasukan','keterangan','tanggal'];
    public $timestamps = false;
}

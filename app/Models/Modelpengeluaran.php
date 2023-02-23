<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Modelpengeluaran extends Model
{
    use Sortable;

    protected $table = 'outcomes';
    protected $primarykey = 'id';
    protected $fillable = ['nominal','jenis_pengeluaran','keterangan','tanggal'];
    public $timestamps = false;

    public $sortable = [
        'nominal','tanggal'
    ];

    public static function totalOutcome()
    {
        return self::sum('nominal');
    }
}
